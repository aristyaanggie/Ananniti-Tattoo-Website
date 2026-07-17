<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ArtistProfileSeeder::class,
            CategorySeeder::class,
            ProductBadgeSeeder::class,
            SectionSeeder::class,
            SettingSeeder::class,
            WhatsappTemplateSeeder::class,
        ]);
    }
}
