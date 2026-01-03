<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DemoContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Services
        $services = [
            [
                'title' => 'E-Learning & Portfolio',
                'excerpt' => 'Solusi website pendidikan dan pameran karya profesional.',
                'description' => 'Membangun platform pembelajaran interaktif atau portofolio digital yang memukau untuk meningkatkan personal branding atau kredibilitas institusi Anda.',
                'icon' => null,
                'order' => 1
            ],
            [
                'title' => 'Custom Web Application',
                'excerpt' => 'Sistem kustom berbasis web untuk kebutuhan bisnis spesifik.',
                'description' => 'Solusi perangkat lunak berbasis cloud yang dikembangkan khusus sesuai alur kerja bisnis Anda, mulai dari sistem inventaris hingga manajemen data kompleks.',
                'icon' => null,
                'order' => 2
            ],
            [
                'title' => 'Modifikasi & Refactor',
                'excerpt' => 'Modernisasi dan peningkatan fitur website yang sudah ada.',
                'description' => 'Memperbaiki bug, meningkatkan kecepatan akses, mengganti desain lama dengan UI modern, hingga integrasi API baru ke dalam sistem yang sudah berjalan.',
                'icon' => null,
                'order' => 3
            ],
        ];
        foreach ($services as $s) {
            DB::table('services')->updateOrInsert(
                ['slug' => Str::slug($s['title'])],
                array_merge($s, [
                    'slug' => Str::slug($s['title']),
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ])
            );
        }

        // Process steps
        $process = [
            ['title' => 'Discovery', 'description' => 'Bedah kebutuhan dan tujuan bisnis Anda.', 'order' => 1],
            ['title' => 'Strategy', 'description' => 'Menyusun alur kerja dan teknologi yang tepat.', 'order' => 2],
            ['title' => 'Development', 'description' => 'Proses koding dengan standar kualitas tinggi.', 'order' => 3],
            ['title' => 'Final QA', 'description' => 'Pengujian menyeluruh sebelum meluncur.', 'order' => 4],
            ['title' => 'Deployment', 'description' => 'Website siap diakses oleh publik.', 'order' => 5],
        ];
        foreach ($process as $p) {
            DB::table('process_steps')->updateOrInsert(
                ['order' => $p['order']],
                array_merge($p, ['is_active' => true, 'created_at' => now(), 'updated_at' => now()])
            );
        }

        // Timeline steps
        $timeline = [
            ['title' => 'Analisis', 'description' => 'Pengumpulan data & dokumen.', 'order' => 1],
            ['title' => 'Desain UI/UX', 'description' => 'Mockup & purwarupa visual.', 'order' => 2],
            ['title' => 'Koding', 'description' => 'Pembangunan sistem inti.', 'order' => 3],
            ['title' => 'Review', 'description' => 'Umpan balik & perbaikan.', 'order' => 4],
            ['title' => 'Serah Terima', 'description' => 'Pelatihan & penyerahan aset.', 'order' => 5],
        ];
        foreach ($timeline as $t) {
            DB::table('timeline_steps')->updateOrInsert(
                ['order' => $t['order']],
                array_merge($t, ['is_active' => true, 'created_at' => now(), 'updated_at' => now()])
            );
        }

        // FAQs
        $faqs = [
            ['question' => 'Mengapa memilih SyntaxTrust?', 'answer' => 'Kami mengutamakan kualitas koding yang bersih (clean code) dan desain premium yang memberikan kesan profesional pada bisnis Anda.', 'category' => 'Umum', 'order' => 1],
            ['question' => 'Berapa biaya jasa pembuatannya?', 'answer' => 'Biaya sangat fleksibel tergantung kompleksitas fitur. Kami terbuka untuk negosiasi sesuai anggaran yang Anda miliki.', 'category' => 'Biaya', 'order' => 2],
            ['question' => 'Apakah ada dukungan pasca rilis?', 'answer' => 'Ya, kami memberikan dukungan teknis gratis selama 30 hari setelah peluncuran untuk memastikan website berjalan lancar.', 'category' => 'Support', 'order' => 3],
        ];
        foreach ($faqs as $f) {
            DB::table('faqs')->updateOrInsert(
                ['question' => $f['question']],
                array_merge($f, ['is_active' => true, 'created_at' => now(), 'updated_at' => now()])
            );
        }

        // Contact infos
        $contacts = [
            ['type' => 'email', 'label' => 'Email Resmi', 'value' => 'engineertekno@gmail.com', 'order' => 1],
            ['type' => 'whatsapp', 'label' => 'Customer Service', 'value' => '6285156553226', 'order' => 2],
            ['type' => 'instagram', 'label' => 'Instagram', 'value' => '@syntaxtrust', 'order' => 3],
        ];
        foreach ($contacts as $c) {
            DB::table('contact_infos')->updateOrInsert(
                ['type' => $c['type']],
                array_merge($c, ['is_active' => true, 'created_at' => now(), 'updated_at' => now()])
            );
        }

        // Active Promo
        DB::table('promos')->updateOrInsert(
            ['title' => 'New Year Launch Offer'],
            [
                'title' => 'New Year Launch Offer',
                'description' => 'Dapatkan potongan harga hingga 20% untuk paket kustom website selama bulan Januari.',
                'discount_type' => 'percent',
                'amount' => 20,
                'starts_at' => now()->startOfMonth(),
                'ends_at' => now()->endOfMonth(),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
