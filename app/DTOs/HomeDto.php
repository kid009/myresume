<?php

namespace App\DTOs;

class HomeDto
{
    public function __construct(
        public readonly array $roles,
        public readonly array $socials
    ) {}

    public static function make(): self
    {
        return new self(
            roles: [
                'Full Stack Developer',
                'Laravel Specialist',
            ],
            socials: [
                'github' => 'https://github.com/kid009', // ใส่ลิงก์จริงของพี่ได้เลย
                'facebook' => 'https://facebook.com/your-profile',
                'linkedin' => 'https://www.linkedin.com/in/pongpoom-keawsungnern-817250120/',
            ]
        );
    }
}
