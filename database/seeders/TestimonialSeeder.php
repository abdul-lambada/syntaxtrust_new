<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'author_name' => 'Raka',
                'author_role' => 'Mahasiswa',
                'avatar_url' => null,
                'content' => 'Proses cepat dan hasil sesuai brief. Komunikasi enak.',
                'rating' => 5,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'author_name' => 'Dina',
                'author_role' => 'UMKM',
                'avatar_url' => null,
                'content' => 'UI modern, mobile friendly. Penyesuaian cepat saat revisi.',
                'rating' => 5,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'author_name' => 'Fajar',
                'author_role' => 'Freelancer',
                'avatar_url' => null,
                'content' => 'Integrasi fitur custom berjalan mulus dan rapi.',
                'rating' => 5,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'author_name' => 'Sinta',
                'author_role' => 'Owner Toko Online',
                'avatar_url' => null,
                'content' => 'Tim responsif, timeline jelas, dan hasil rapi. Rekomended!',
                'rating' => 5,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'author_name' => 'Budi',
                'author_role' => 'Konsultan',
                'avatar_url' => null,
                'content' => 'Perbaikan performa signifikan, skor Lighthouse meningkat.',
                'rating' => 5,
                'order' => 5,
                'is_active' => true,
            ],
            [
                'author_name' => 'Maya',
                'author_role' => 'Pemilik Kafe',
                'avatar_url' => null,
                'content' => 'Desain sesuai brand, mudah dikelola dan SEO dasar sudah siap.',
                'rating' => 5,
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($data as $row) {
            DB::table('testimonials')->updateOrInsert([
                'author_name' => $row['author_name'],
                'order' => $row['order'],
            ], $row + [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
