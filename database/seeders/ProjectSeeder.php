<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        $projects = [
            [
                'title' => 'Sistem Informasi Manajemen Sekolah',
                'category' => 'Web Application',
                'description' => "Platform digital komprehensif untuk memodernisasi administrasi sekolah. Mencakup modul kesiswaan, akademik, keuangan, dan perpustakaan dalam satu ekosistem terintegrasi.\n\nFitur Utama:\n- PPDB Online & Manajemen Siswa\n- E-Raport & Presensi Digital\n- Pembayaran SPP Online\n- Portal Orang Tua",
                'client_name' => 'SMA Negeri 1 Jakarta',
                'link' => 'https://demo-school.syntaxtrust.com',
                'image' => null, // Placeholder or assume user will upload
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'E-Commerce Fashion Brand Local',
                'category' => 'Web Development',
                'description' => "Toko online modern dengan desain minimalis dan fokus pada user experience (UX). Dilengkapi dengan integrasi payment gateway otomatis dan sistem manajemen stok real-time.",
                'client_name' => 'LocalVibe Clothing',
                'link' => 'https://store.example.com',
                'image' => null,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Company Profile Perusahaan Konstruksi',
                'category' => 'Website',
                'description' => "Website company profile profesional untuk membangun kredibilitas digital. Menampilkan portofolio proyek dengan galeri interaktif dan form penawaran yang mudah diakses.",
                'client_name' => 'PT. Bangun Cipta Karya',
                'link' => 'https://construct-demo.com',
                'image' => null,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Aplikasi Kasir (POS) Berbasis Cloud',
                'category' => 'Web Application',
                'description' => "Sistem Point of Sales (POS) berbasis cloud untuk UMKM F&B. Mendukung manajemen multi-outlet, laporan keuangan harian otomatis, dan manajemen inventaris bahan baku.",
                'client_name' => 'Kopi Senja Franchise',
                'link' => null, // No link available
                'image' => null,
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($projects as $project) {
            Project::create([
                'title' => $project['title'],
                'slug' => Str::slug($project['title']),
                'category' => $project['category'],
                'description' => $project['description'],
                'client_name' => $project['client_name'],
                'link' => $project['link'],
                'image' => $project['image'],
                'is_active' => $project['is_active'],
                'order' => $project['order'],
            ]);
        }
    }
}
