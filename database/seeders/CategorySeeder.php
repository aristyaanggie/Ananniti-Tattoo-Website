<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Tattoo Machine', 'slug' => 'tattoo-machine', 'type' => 'product', 'display_order' => 1, 'is_visible' => true],
            ['name' => 'Tattoo Ink', 'slug' => 'tattoo-ink', 'type' => 'product', 'display_order' => 2, 'is_visible' => true],
            ['name' => 'Needle', 'slug' => 'needle', 'type' => 'product', 'display_order' => 3, 'is_visible' => true],
            ['name' => 'Tattoo Kit', 'slug' => 'tattoo-kit', 'type' => 'product', 'display_order' => 4, 'is_visible' => true],
            ['name' => 'Furniture', 'slug' => 'furniture', 'type' => 'product', 'display_order' => 5, 'is_visible' => true],
            ['name' => 'Others', 'slug' => 'others', 'type' => 'product', 'display_order' => 6, 'is_visible' => true],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
