<?php

use Livewire\Component;
use Livewire\WithFileUploads; // จำเป็นสำหรับการอัปโหลดไฟล์
use Livewire\Attributes\Validate;
use App\Models\PersonalInfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // <--- อย่าลืม Import
use Illuminate\Support\Facades\DB; // <--- อย่าลืม Import

new class extends Component {
    use WithFileUploads;

    // --- Form Properties ---

    #[Validate('required|string|max:255')]
    public $full_name;

    #[Validate('required|string|max:255')]
    public $profile_title; // เช่น "Senior Laravel Developer"

    #[Validate('nullable|string')]
    public $about_me;

    #[Validate('nullable|string|max:255')]
    public $email; // สำหรับโชว์หน้าเว็บ (คนละอันกับ Login)
    // สูงสุด 2MB

    // --- Image Properties ---

    #[Validate('nullable|image|max:2048')]
    public $hero_image_new; // สำหรับรับไฟล์ใหม่
    public $hero_image_path; // สำหรับเก็บ path เดิม

    #[Validate('nullable|image|max:2048')]
    public $profile_image_new;
    public $profile_image;

    public $social_links = [];

    // --- Lifecycle Hooks ---
    public function mount()
    {
        // ดึงข้อมูลแถวแรกมา (ถ้าไม่มีให้ว่างไว้)
        $info = PersonalInfo::first();

        if ($info) {
            $this->full_name = $info->full_name;
            $this->profile_title = $info->profile_title;
            $this->about_me = $info->about_me;
            $this->email = $info->email;
            $this->hero_image_path = $info->hero_image; // เก็บ path เดิมไว้แสดงผล
            $this->profile_image = $info->profile_image;

            $this->social_links = array_merge(
                [
                    'facebook' => '',
                    'linkedin' => '',
                    'github' => '',
                ],
                $info->social_links ?? [],
            );
        } else {
            // กรณีสร้างใหม่ เตรียม array เปล่าไว้
            $this->social_links = [
                'facebook' => '',
                'linkedin' => '',
                'github' => '',
            ];
        }
    }

    public function save()
    {
        $this->validate();

        $this->validate([
            'social_links.*' => 'nullable|url', // เช็คทุกตัวใน array ว่าต้องเป็น URL
        ], [
            'social_links.*.url' => 'กรุณากรอกลิงก์ให้ถูกต้อง (ต้องมี http:// หรือ https://)',
        ]);

        try {
            DB::transaction(function () {
                // 1. หา Record เดิม หรือเตรียมสร้างใหม่
                $info = PersonalInfo::firstOrNew();
                // dd($info);
                // 2. จัดการ Hero Image
                if ($this->hero_image_new) {
                    // ลบรูปเก่าถ้ามี
                    if ($info->hero_image) {
                        Storage::disk('public')->delete($info->hero_image);
                    }
                    // บันทึกรูปใหม่
                    $info->hero_image = $this->hero_image_new->store('hero-images', 'public');
                }

                // 3. จัดการ Profile Image
                if ($this->profile_image_new) {
                    if ($info->profile_image) {
                        Storage::disk('public')->delete($info->profile_image);
                    }
                    $info->profile_image = $this->profile_image_new->store('profile-images', 'public');
                }

                // 4. บันทึกข้อมูล Text
                $info->full_name = $this->full_name;
                $info->profile_title = $this->profile_title;
                $info->about_me = $this->about_me;
                $info->email = $this->email;
                $info->user_id = Auth::id(); // เก็บ ID ผู้แก้ไขล่าสุด
                $info->social_links = $this->social_links; // บันทึกเป็น JSON อัตโนมัติ

                $info->save();

                // 5. Feedback & Reset Uploads
                $this->dispatch('show-toast', message: 'บันทึกข้อมูลเรียบร้อยแล้ว!');

                // Reset ตัวแปร upload เพื่อเคลียร์ input file
                $this->reset(['hero_image_new', 'profile_image_new']);

                // Update path ใหม่ให้หน้าเว็บแสดงผลทันที
                $this->hero_image_path = $info->hero_image;
                $this->profile_image = $info->profile_image;
            });
        } catch (\Exception $e) {
            // 1. บันทึก Log ไว้อ่านเอง (สำคัญมาก!)
            // ไฟล์จะอยู่ที่ storage/logs/laravel.log
            Log::error('Profile Update Failed: ' . $e->getMessage());

            // 2. แจ้ง User ว่าพัง (ส่ง Toast สีแดง)
            $this->dispatch('show-toast', [
                'type' => 'error',
                'message' => 'เกิดข้อผิดพลาด! กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ดูแลระบบ',
            ]);
        }
    }
};
?>

<div class="max-w-4xl mx-auto py-6">

    <div class="md:grid md:grid-cols-3 md:gap-6">

        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Profile Images</h3>
                <p class="mt-1 text-sm text-gray-600">
                    รูปภาพที่จะแสดงในส่วน Hero และ About
                </p>
            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit="save">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Hero Background</label>

                            <div class="mt-2 flex items-center gap-x-4">
                                @if ($hero_image_new)
                                    <img src="{{ $hero_image_new->temporaryUrl() }}"
                                        class="h-32 w-full object-cover rounded-md border border-gray-300">
                                @elseif($hero_image_path)
                                    <img src="{{ asset('storage/' . $hero_image_path) }}"
                                        class="h-32 w-full object-cover rounded-md border border-gray-300">
                                @else
                                    <div
                                        class="h-32 w-full bg-gray-100 flex items-center justify-center rounded-md border border-dashed border-gray-300 text-gray-400">
                                        No Image
                                    </div>
                                @endif
                            </div>

                            <input type="file" wire:model="hero_image_new"
                                class="mt-2 block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100
                            " />
                            @error('hero_image_new')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
                            <div class="mt-2 flex items-center gap-4">
                                @if ($profile_image_new)
                                    <img src="{{ $profile_image_new->temporaryUrl() }}"
                                        class="h-20 w-20 rounded-full object-cover border">
                                @elseif($profile_image)
                                    <img src="{{ asset('storage/' . $profile_image) }}"
                                        class="h-20 w-20 rounded-full object-cover border">
                                @else
                                    <span class="h-20 w-20 rounded-full overflow-hidden bg-gray-100 border">
                                        <svg class="h-full w-full text-gray-300" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </span>
                                @endif

                                <input type="file" wire:model="profile_image_new"
                                    class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                            </div>
                            @error('profile_image_new')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr>

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" wire:model="full_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                                @error('full_name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Public Email</label>
                                <input type="email" wire:model="email"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                                @error('email')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label class="block text-sm font-medium text-gray-700">Profile Title (Skills)</label>
                                <input type="text" wire:model="profile_title"
                                    placeholder="e.g. Developer, Designer, Freelancer"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                                <p class="mt-1 text-xs text-gray-500">ใช้เครื่องหมายจุลภาค (,)
                                    คั่นสำหรับข้อความแบบพิมพ์ดีด</p>
                                @error('profile_title')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label class="block text-sm font-medium text-gray-700">About Me / Bio</label>
                                <textarea wire:model="about_me" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2"></textarea>
                                @error('about_me')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <hr class="col-span-6 my-4">

                        <div class="col-span-6">
                            <h4 class="text-md font-medium text-gray-900 mb-4">Social Media Links</h4>

                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700">Facebook URL</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                                </path>
                                            </svg>
                                        </div>
                                        <input type="text" wire:model="social_links.facebook"
                                            class="pl-10 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border p-2"
                                            placeholder="https://facebook.com/username">
                                    </div>
                                    @error('social_links.facebook')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z">
                                                </path>
                                            </svg>
                                        </div>
                                        <input type="text" wire:model="social_links.linkedin"
                                            class="pl-10 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border p-2"
                                            placeholder="https://linkedin.com/in/username">
                                    </div>
                                    @error('social_links.linkedin')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700">Github URL</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z">
                                                </path>
                                            </svg>
                                        </div>
                                        <input type="text" wire:model="social_links.github"
                                            class="pl-10 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border p-2"
                                            placeholder="https://github.com/username">
                                    </div>
                                    @error('social_links.github')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

                        <div class="mr-4 inline-block">
                            <span x-data="{ show: false }" x-init="@this.on('saved', () => {
                                show = true;
                                setTimeout(() => show = false, 2000)
                            })" x-show="show"
                                class="text-green-600 text-sm font-medium transition" style="display: none;">
                                Saved!
                            </span>
                        </div>

                        <button type="submit" wire:loading.attr="disabled"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50">

                            <span wire:loading.remove wire:target="save, hero_image_new, profile_image_new">Save
                                Profile</span>
                            <span wire:loading wire:target="save">Saving...</span>
                            <span wire:loading wire:target="hero_image_new, profile_image_new">Uploading...</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
