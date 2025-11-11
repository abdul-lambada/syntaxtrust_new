<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['title' => 'Tugas Kuliah', 'excerpt' => 'Bantu pengerjaan website untuk tugas kuliah', 'description' => 'Pengerjaan cepat, rapi, dan dapat dijelaskan saat presentasi.', 'icon' => 'graduation-cap', 'order' => 1],
            ['title' => 'Modifikasi Website', 'excerpt' => 'Perbaikan/penambahan fitur pada website', 'description' => 'Refactor, bugfix, peningkatan UI/UX, dan integrasi kecil.', 'icon' => 'wrench', 'order' => 2],
            ['title' => 'Website dari Nol', 'excerpt' => 'Membangun website baru end-to-end', 'description' => 'Analisis kebutuhan, desain, implementasi, hingga deploy.', 'icon' => 'rocket', 'order' => 3],
        ];
        foreach ($services as $s) {
            DB::table('services')->updateOrInsert(['slug' => Str::slug($s['title'])], $s + ['slug' => Str::slug($s['title']), 'is_active' => true, 'created_at' => now(), 'updated_at' => now()]);
        }

        // Process steps
        $process = [
            ['title' => 'Diskusi Kebutuhan', 'description' => 'Memahami scope dan tujuan proyek', 'order' => 1],
            ['title' => 'Perencanaan', 'description' => 'Menyusun rencana kerja dan timeline', 'order' => 2],
            ['title' => 'Implementasi', 'description' => 'Pengembangan fitur inti dan antarmuka', 'order' => 3],
            ['title' => 'Uji & Revisi', 'description' => 'Pengujian, perbaikan, dan penyempurnaan', 'order' => 4],
            ['title' => 'Rilis', 'description' => 'Deploy dan serah terima', 'order' => 5],
        ];
        foreach ($process as $i => $p) {
            DB::table('process_steps')->updateOrInsert(['order' => $p['order']], $p + ['is_active' => true, 'created_at' => now(), 'updated_at' => now()]);
        }

        // Timeline steps
        $timeline = [
            ['title' => 'Kickoff', 'description' => 'Konfirmasi kebutuhan & akses', 'order' => 1],
            ['title' => 'Desain', 'description' => 'Wireframe/Hi‑Fi & feedback', 'order' => 2],
            ['title' => 'Development', 'description' => 'Frontend + backend', 'order' => 3],
            ['title' => 'QA', 'description' => 'Testing fungsional & UX', 'order' => 4],
            ['title' => 'Go‑Live', 'description' => 'Deploy & monitoring', 'order' => 5],
        ];
        foreach ($timeline as $t) {
            DB::table('timeline_steps')->updateOrInsert(['order' => $t['order']], $t + ['is_active' => true, 'created_at' => now(), 'updated_at' => now()]);
        }

        // Testimonials
        $testimonials = [
            ['author_name' => 'Rizky', 'author_role' => 'Mahasiswa', 'content' => 'Sangat membantu untuk tugas kuliah. Penjelasannya jelas!', 'rating' => 5, 'order' => 1],
            ['author_name' => 'Dina', 'author_role' => 'Owner UMKM', 'content' => 'Website cepat jadi dan tampilannya modern.', 'rating' => 5, 'order' => 2],
        ];
        foreach ($testimonials as $t) {
            DB::table('testimonials')->updateOrInsert(['author_name' => $t['author_name'], 'order' => $t['order']], $t + ['is_active' => true, 'created_at' => now(), 'updated_at' => now()]);
        }

        // FAQs
        $faqs = [
            ['question' => 'Berapa lama pembuatan website?', 'answer' => 'Tergantung scope. Landing page 3‑7 hari kerja.', 'category' => 'Umum', 'order' => 1],
            ['question' => 'Apakah bisa revisi?', 'answer' => 'Bisa, termasuk 1‑2 kali revisi ringan.', 'category' => 'Umum', 'order' => 2],
            ['question' => 'Metode meeting?', 'answer' => 'Google Meet atau WhatsApp call sesuai preferensi.', 'category' => 'Meeting', 'order' => 3],
        ];
        foreach ($faqs as $f) {
            DB::table('faqs')->updateOrInsert(['question' => $f['question']], $f + ['is_active' => true, 'created_at' => now(), 'updated_at' => now()]);
        }

        // Contact infos
        $contacts = [
            ['type' => 'email', 'label' => 'Email', 'value' => 'engineertekno@gmail.com', 'order' => 1],
            ['type' => 'whatsapp', 'label' => 'WhatsApp', 'value' => '6285156553226', 'order' => 2],
        ];
        foreach ($contacts as $c) {
            DB::table('contact_infos')->updateOrInsert(['type' => $c['type']], $c + ['is_active' => true, 'created_at' => now(), 'updated_at' => now()]);
        }

        // Promo contoh
        DB::table('promos')->updateOrInsert(['title' => 'Diskon Project Pertama'], [
            'title' => 'Diskon Project Pertama',
            'description' => 'Diskon hingga 15% untuk project pertama, klaim via jadwal/WA.',
            'discount_type' => 'percent',
            'amount' => 15,
            'starts_at' => now()->subDay(),
            'ends_at' => now()->addMonth(),
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
