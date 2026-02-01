<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();

            // user_id: ผมแนะนำให้ nullable ไว้ก่อนสำหรับโปรเจกต์แบบนี้
            // เผื่อเราอยากสร้าง Info ทิ้งไว้โดยยังไม่ผูกกับ User หรือกรณี User โดนลบ
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // --- 1. ข้อมูลส่วนตัว (Text) ---
            $table->string('full_name')->nullable();      // ชื่อ-นามสกุล
            $table->string('email')->nullable();          // <--- [เพิ่ม] Email สำหรับติดต่อหน้าเว็บ
            $table->string('profile_title')->nullable();  // ตำแหน่งงาน (ข้อความวิ่งๆ)
            $table->text('about_me')->nullable();         // เกี่ยวกับฉัน (Text Area)

            // --- 2. รูปภาพ (เก็บ Path) ---
            $table->string('hero_image')->nullable();     // รูป Background ใหญ่
            $table->string('profile_image')->nullable();  // <--- [เพิ่ม] รูปโปรไฟล์วงกลม

            // --- 3. Social Links (เผื่อไว้เก็บ JSON ตามแผนอนาคต) ---
            $table->json('social_links')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_infos');
    }
};
