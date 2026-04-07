<?php

namespace App\DTOs;

class ProjectDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $category, // เช่น 'web', 'pos', 'tool'
        public readonly string $github_url,
        public readonly array $tags // เช่น ['Laravel', 'Livewire', 'Google Maps']
    ) {}
}

class PortfolioDto
{
    public static function getProjects(): array
    {
        return [
            new ProjectDto(
                id: 'restaurant-finder',
                category: 'web',
                github_url: 'https://github.com/kid009/restaurant-finder',
                tags: ['Laravel', 'VueJs', 'MySQL', 'Bootstrap']
            ),
            new ProjectDto(
                id: 'pos-gas-shop',
                category: 'pos',
                github_url: 'https://github.com/kid009/pos-system',
                tags: ['Laravel', 'MySQL', 'AlpineJs', 'Bootstrap']
            ),
            // เพิ่มโปรเจคอื่นๆ ได้ที่นี่
        ];
    }
}
