<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::truncate();

        $data = [
            [
                'author_name' => 'Aditya Pratama',
                'author_role' => 'Mahasiswa Tingkat Akhir',
                'content' => 'Sangat terbantu untuk pengerjaan project skripsi saya. Penjelasannya sangat detail sehingga saya bisa lancar saat presentasi di depan dosen penguji.',
                'rating' => 5,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'author_name' => 'Dina Amalia',
                'author_role' => 'Owner Kedai Kopi',
                'content' => 'Tampilan website kafe saya jadi jauh lebih modern dan profesional. Tim SyntaxTrust sangat responsif saat diajak diskusi konsep desain.',
                'rating' => 5,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'author_name' => 'Fajar Setiawan',
                'author_role' => 'Project Manager',
                'content' => 'Integrasi API dan fitur custom backend-nya berjalan mulus. Kodingannya rapi (clean code) sehingga sangat mudah untuk kami maintenance ke depannya.',
                'rating' => 5,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'author_name' => 'Sinta Wijaya',
                'author_role' => 'Brand Owner',
                'content' => 'Tim yang sangat bisa diandalkan. Timeline pengerjaan jelas dan hasil akhirnya melampaui ekspektasi kami. Benar-benar jasa web terbaik!',
                'rating' => 5,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($data as $row) {
            Testimonial::create($row);
        }
    }
}
