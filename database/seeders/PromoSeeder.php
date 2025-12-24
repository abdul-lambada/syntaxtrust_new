<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promo;

class PromoSeeder extends Seeder
{
    public function run(): void
    {
        Promo::truncate();

        Promo::create([
            'title' => 'Promo Mahasiswa & UMKM',
            'description' => 'Khusus pengerjaan Tugas Kuliah & Web UMKM, dapatkan potongan flat 50rb atau diskon 10% untuk pengerjaan dari nol! Klaim sekarang.',
            'discount_type' => 'percent',
            'amount' => 10,
            'is_active' => true,
            'starts_at' => now(),
            'ends_at' => now()->addMonths(3),
        ]);
    }
}
