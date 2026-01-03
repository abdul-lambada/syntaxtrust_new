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
                'description' => "Platform digital komprehensif untuk memodernisasi administrasi sekolah. Mencakup modul kesiswaan, akademik, keuangan, dan perpustakaan.",
                'challenge' => "Sekolah mengalami kesulitan dalam mengelola data siswa yang masih manual, sering terjadi duplikasi data, dan transparansi keuangan yang rendah kepada orang tua.",
                'solution' => "Membangun sistem berbasis cloud dengan Laravel 11. Mengimplementasikan modul PPDB online, E-Raport, dan integrasi Payment Gateway untuk pembayaran SPP otomatis.",
                'result' => "Efisiensi administrasi meningkat 70%, orang tua dapat memantau perkembangan anak secara realtime, dan nol kesalahan dalam laporan keuangan bulanan.",
                'client_name' => 'SMA Negeri 1 Jakarta',
                'link' => 'https://demo-school.syntaxtrust.com',
                'image' => null,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'E-Commerce Fashion Brand Local',
                'category' => 'Web Development',
                'description' => "Toko online modern dengan desain minimalis dan fokus pada user experience (UX) untuk meningkatkan konversi penjualan.",
                'challenge' => "Brand memiliki website lama yang lambat, tidak mobile-friendly, dan proses checkout yang rumit sehingga tingkat checkout abandonment sangat tinggi.",
                'solution' => "Redesain total menggunakan Tailwind CSS 4 dan Alpine.js untuk performa maksimal. Menederhanakan alur checkout menjadi 3 langkah mudah dan integrasi pengiriman otomatis.",
                'result' => "Kecepatan akses meningkat 3x lipat, konversi penjualan naik 45%, dan penurunan komplain teknis dari pelanggan hingga 90%.",
                'client_name' => 'LocalVibe Clothing',
                'link' => 'https://store.example.com',
                'image' => null,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Company Profile Konstruksi Modern',
                'category' => 'Website',
                'description' => "Website company profile profesional untuk membangun kredibilitas digital perusahaan konstruksi nasional.",
                'challenge' => "Perusahaan butuh wadah untuk menampilkan portofolio proyek raksasa mereka dengan cara yang impresif namun tetap ringan diakses oleh calon investor.",
                'solution' => "Menggunakan teknik animasi interaktif dan galeri gambar teroptimasi. Menambahkan fitur peta interaktif proyek yang tersebar di seluruh Indonesia.",
                'result' => "Meningkatkan citra profesional perusahaan di mata investor asing dan mempermudah tim marketing dalam membagikan katalog proyek secara digital.",
                'client_name' => 'PT. Bangun Cipta Karya',
                'link' => 'https://construct-demo.com',
                'image' => null,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Aplikasi Kasir (POS) Berbasis Cloud',
                'category' => 'Web Application',
                'description' => "Sistem Point of Sales (POS) berbasis cloud untuk UMKM F&B yang mendukung manajemen multi-outlet.",
                'challenge' => "Pemilik bisnis kesulitan memantau stok dan penjualan harian di 5 cabang yang berbeda secara sinkron, menyebabkan seringnya stok kosong tanpa sepengetahuan pusat.",
                'solution' => "Pengembangan aplikasi web dengan database terpusat dan sistem sinkronisasi offline-first. Dilengkapi dashboard analitik real-time untuk owner.",
                'result' => "Owner bisa memantau performa 5 outlet sekaligus dari handphone, stok bahan baku terkontrol 100%, dan laporan laba-rugi tersedia dalam satu klik.",
                'client_name' => 'Kopi Senja Franchise',
                'link' => null,
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
                'challenge' => $project['challenge'],
                'solution' => $project['solution'],
                'result' => $project['result'],
                'client_name' => $project['client_name'],
                'link' => $project['link'],
                'image' => $project['image'],
                'is_active' => $project['is_active'],
                'order' => $project['order'],
            ]);
        }
    }
}
