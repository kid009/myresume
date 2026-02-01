<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;

new #[Layout('layouts.auth')] class extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public function login()
    {
        $this->validate();

        // 2. Security: Rate Limiting (ป้องกันการสุ่มรหัสผ่าน)
        $throttleKey = Str::lower($this->email) . '|' . request()->ip();

        if(RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            $this->addError('email', "Too many login attempts. Please try again in {$seconds} seconds.");
            return;
        }

        // 3. Attempt Login
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            RateLimiter::clear($throttleKey); // ล้างประวัติเมื่อ Login ผ่าน

            return redirect()->to('/admin/profile');
        }

        // 4. Failed Login: Record hit & Add Error
        RateLimiter::hit($throttleKey);

        // ใช้ addError ของ Livewire แทนการ redirect back เพื่อความลื่นไหล
        $this->addError('email', 'The provided credentials do not match our records.');

        // เคลียร์รหัสผ่านทิ้งเพื่อความปลอดภัย
        $this->reset('password');

    }
};
?>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 bg-gray-50">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
            Sign in to Resume Admin
        </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <div class="bg-white px-6 py-8 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" wire:submit="login">

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                        Email address
                    </label>
                    <div class="mt-2 relative">
                        <input id="email"
                               type="email"
                               wire:model="email"
                               autocomplete="email"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6
                                      {{ $errors->has('email') ? 'ring-red-300 focus:ring-red-500 text-red-900' : 'ring-gray-300 focus:ring-indigo-600' }}">

                        @error('email')
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        @enderror
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                        Password
                    </label>
                    <div class="mt-2 relative">
                        <input id="password"
                               type="password"
                               wire:model="password"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6
                                      {{ $errors->has('password') ? 'ring-red-300 focus:ring-red-500' : 'ring-gray-300 focus:ring-indigo-600' }}">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            wire:loading.attr="disabled"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:opacity-50 disabled:cursor-not-allowed transition">

                        <svg wire:loading wire:target="login" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>

                        <span wire:loading.remove wire:target="login">Sign in</span>
                        <span wire:loading wire:target="login">Signing in...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
