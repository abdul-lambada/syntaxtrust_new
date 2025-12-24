<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PricingPackage;

class PricingPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PricingPackage::truncate();

        PricingPackage::create([
            'name' => 'Modifikasi & Fix Bug',
            'tagline' => 'Perbaikan atau penambahan fitur website yang sudah ada',
            'price_text' => 'Nego',
            'price_subtext' => '/Project',
            'badge' => 'Paling Fleksibel',
            'features' => [
                ['text' => 'Fix Error, Bug & Tampilan', 'active' => true],
                ['text' => 'Penambahan Fitur Baru', 'active' => true],
                ['text' => 'Optimasi Speed & Performa', 'active' => true],
                ['text' => 'Konsultasi Perubahan Scope', 'active' => true],
                ['text' => 'Hosting & Domain (Call for Fee)', 'active' => true],
            ],
            'order' => 1,
            'is_highlighted' => false,
            'whatsapp_message' => 'Halo SyntaxTrust, saya punya website yang ingin dimodifikasi/diperbaiki',
        ]);

        PricingPackage::create([
            'name' => 'Web Tugas Kuliah',
            'tagline' => 'Bantu selesaikan project web tugas kuliah & skripsi',
            'price_text' => 'Mulai 500rb',
            'price_subtext' => '/Nego',
            'badge' => 'Favorit Pelajar',
            'features' => [
                ['text' => 'Full Source Code & Database', 'active' => true],
                ['text' => 'Penjelasan Alur Program', 'active' => true],
                ['text' => 'Teknologi Sesuai Request', 'active' => true],
                ['text' => 'Gratis Deploy Localhost/Tunel', 'active' => true],
                ['text' => 'Hosting Online (Opsional +Fee)', 'active' => true],
            ],
            'order' => 2,
            'is_highlighted' => true,
            'whatsapp_message' => 'Halo SyntaxTrust, saya butuh bantuan untuk project web tugas kuliah saya',
        ]);

        PricingPackage::create([
            'name' => 'Website Dari Nol',
            'tagline' => 'Pembuatan sistem informasi atau web bisnis dari awal',
            'price_text' => 'Mulai 2Jt',
            'price_subtext' => '/Negotiable',
            'badge' => 'Solusi Lengkap',
            'features' => [
                ['text' => 'Custom Branding & Design', 'active' => true],
                ['text' => 'Dashboard Management (CMS)', 'active' => true],
                ['text' => 'Maintenance Awal & Support', 'active' => true],
                ['text' => 'Manual Book & Cara Pakai', 'active' => true],
                ['text' => 'Hosting & Domain (Opsional +Fee)', 'active' => true],
            ],
            'order' => 3,
            'is_highlighted' => false,
            'whatsapp_message' => 'Halo SyntaxTrust, saya mau buat website baru dari nol sesuai kebutuhan saya',
        ]);
    }
}
