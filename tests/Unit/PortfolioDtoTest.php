<?php

namespace Tests\Unit;

use App\DTOs\PortfolioDto;
use App\DTOs\ProjectDto;
use PHPUnit\Framework\TestCase;

class PortfolioDtoTest extends TestCase
{
    public function test_get_projects_returns_array(): void
    {
        $projects = PortfolioDto::getProjects();

        $this->assertIsArray($projects);
        $this->assertNotEmpty($projects);
    }

    public function test_get_projects_returns_project_dto_instances(): void
    {
        $projects = PortfolioDto::getProjects();

        foreach ($projects as $project) {
            $this->assertInstanceOf(ProjectDto::class, $project);
        }
    }

    public function test_project_dto_has_required_properties(): void
    {
        $projects = PortfolioDto::getProjects();
        $project = $projects[0];

        $this->assertNotEmpty($project->id);
        $this->assertNotEmpty($project->category);
        $this->assertNotEmpty($project->github_url);
        $this->assertIsArray($project->tags);
    }

    public function test_project_dto_properties_are_readonly(): void
    {
        $projects = PortfolioDto::getProjects();
        $project = $projects[0];

        $this->assertTrue((new \ReflectionProperty($project, 'id'))->isReadOnly());
        $this->assertTrue((new \ReflectionProperty($project, 'category'))->isReadOnly());
        $this->assertTrue((new \ReflectionProperty($project, 'github_url'))->isReadOnly());
        $this->assertTrue((new \ReflectionProperty($project, 'tags'))->isReadOnly());
    }

    public function test_first_project_is_restaurant_finder(): void
    {
        $projects = PortfolioDto::getProjects();
        $project = $projects[0];

        $this->assertEquals('restaurant-finder', $project->id);
        $this->assertEquals('web', $project->category);
        $this->assertContains('Laravel', $project->tags);
    }
}
