<?php

namespace Tests\Unit;

use App\DTOs\HomeDto;
use PHPUnit\Framework\TestCase;

class HomeDtoTest extends TestCase
{
    public function test_make_returns_home_dto_instance(): void
    {
        $dto = HomeDto::make();

        $this->assertInstanceOf(HomeDto::class, $dto);
    }

    public function test_make_returns_roles(): void
    {
        $dto = HomeDto::make();

        $this->assertIsArray($dto->roles);
        $this->assertNotEmpty($dto->roles);
    }

    public function test_make_returns_socials(): void
    {
        $dto = HomeDto::make();

        $this->assertIsArray($dto->socials);
        $this->assertNotEmpty($dto->socials);
    }

    public function test_roles_contain_developer_role(): void
    {
        $dto = HomeDto::make();

        $this->assertContains('Full Stack Developer', $dto->roles);
    }

    public function test_socials_contain_github(): void
    {
        $dto = HomeDto::make();

        $this->assertArrayHasKey('github', $dto->socials);
    }

    public function test_properties_are_readonly(): void
    {
        $dto = HomeDto::make();

        $this->assertTrue((new \ReflectionProperty($dto, 'roles'))->isReadOnly());
        $this->assertTrue((new \ReflectionProperty($dto, 'socials'))->isReadOnly());
    }
}
