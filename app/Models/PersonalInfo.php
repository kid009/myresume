<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $table = 'personal_infos'; // ระบุชื่อตารางให้ชัวร์
    protected $guarded = []; // ปลดล็อคให้แก้ข้อมูลได้ทุกช่อง (Mass Assignment)

    // เพิ่มบรรทัดนี้สำคัญมาก! แปลง JSON <-> Array อัตโนมัติ
    protected $casts = [
        'social_links' => 'array',
    ];
}
