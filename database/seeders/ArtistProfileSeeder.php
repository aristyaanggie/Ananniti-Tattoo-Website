<?php

namespace Database\Seeders;

use App\Models\ArtistProfile;
use Illuminate\Database\Seeder;

class ArtistProfileSeeder extends Seeder
{
    public function run(): void
    {
        $artists = [
            [
                'name' => 'Ketut Artana',
                'slug' => 'ketut-artana',
                'photo' => 'artists/artist-1.svg',
                'biography' => 'Senior tattoo artist with over 10 years of experience specializing in Balinese traditional and blackwork styles.',
                'specialization' => 'Blackwork, Balinese Traditional',
                'experience_years' => 12,
                'instagram' => '@ketut_artana',
                'display_order' => 1,
                'is_featured' => true,
                'is_visible' => true,
            ],
            [
                'name' => 'Wayan Dharma',
                'slug' => 'wayan-dharma',
                'photo' => 'artists/artist-2.svg',
                'biography' => 'Specialized in Japanese oriental and realism tattoo styles with meticulous attention to detail.',
                'specialization' => 'Oriental, Realism',
                'experience_years' => 8,
                'instagram' => '@wayan_dharma',
                'display_order' => 2,
                'is_featured' => false,
                'is_visible' => true,
            ],
            [
                'name' => 'Made Surya',
                'slug' => 'made-surya',
                'photo' => 'artists/artist-3.svg',
                'biography' => 'Fine line and custom design specialist known for delicate and intricate tattoo artwork.',
                'specialization' => 'Fine Line, Custom Design',
                'experience_years' => 6,
                'instagram' => '@made_surya',
                'display_order' => 3,
                'is_featured' => false,
                'is_visible' => true,
            ],
        ];

        foreach ($artists as $artist) {
            ArtistProfile::firstOrCreate(
                ['slug' => $artist['slug']],
                $artist
            );
        }
    }
}
