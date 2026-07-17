<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['slug' => 'hero', 'title' => 'Hero', 'display_order' => 1, 'is_visible' => true],
            ['slug' => 'about', 'title' => 'About', 'display_order' => 2, 'is_visible' => true],
            ['slug' => 'services', 'title' => 'Services', 'display_order' => 3, 'is_visible' => true],
            ['slug' => 'shop', 'title' => 'Shop', 'display_order' => 4, 'is_visible' => true],
            ['slug' => 'gallery', 'title' => 'Gallery', 'display_order' => 5, 'is_visible' => true],
            ['slug' => 'artists', 'title' => 'Artists', 'display_order' => 6, 'is_visible' => true],
            ['slug' => 'trust', 'title' => 'Trust', 'display_order' => 7, 'is_visible' => true],
            ['slug' => 'consultation', 'title' => 'Consultation', 'display_order' => 8, 'is_visible' => true],
            ['slug' => 'footer', 'title' => 'Footer', 'display_order' => 9, 'is_visible' => true],
        ];

        foreach ($sections as $section) {
            Section::firstOrCreate(
                ['slug' => $section['slug']],
                $section
            );
        }
    }
}
