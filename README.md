<p align="center">
    <strong>SyntaxTrust — Modern Laravel 12 Frontend</strong>
</p>

## Overview

SyntaxTrust adalah landing page interaktif yang dibangun dengan Laravel 12, Tailwind CSS v4, dan Alpine.js. Proyek ini menampilkan beberapa komponen dinamis seperti:

- Hero section bertema siang/malam dengan partikel animasi dan typewriter.
- Carousel teknologi multi-baris dengan autoplay dan kontrol manual.
- Carousel testimoni dengan thumbnail klik dan efek parallax.
- Form jadwal pertemuan dengan validasi inline, progress bar, dan preview pesan.
- Footer modern dengan form newsletter dan ikon sosial bertooltip.

Struktur data (layanan, proses, timeline, testimoni, teknologi, FAQ, kontak, promo, dan site settings) dikelola melalui seeders dan dapat dicadangkan via command khusus.

## Setup Cepat

```bash
git clone https://github.com/your-org/syntaxtrust.git
cd syntaxtrust
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run build # atau npm run dev untuk mode pengembangan
```

## Manajemen Data & Backup

Proyek ini menyediakan mekanisme backup agar data referensi tidak berubah antara lingkungan lokal dan produksi.

### Membuat Backup

```bash
php artisan data:backup
```

Command di atas akan mengekspor tabel penting ke `database/seeders/data/backup.php`. Commit file tersebut untuk menyimpan snapshot data.

### Restore Saat Deploy

`DatabaseSeeder` memanggil `BackupDataSeeder` sehingga menjalankan:

```bash
php artisan migrate --seed
```

akan menghapus isi tabel target dan mengisinya ulang berdasarkan backup. Pastikan file backup sudah dibuat sebelum deployment.

## Struktur Penting

- `app/Console/Commands/BackupDataCommand.php` – command untuk mengekspor data.
- `database/seeders/BackupDataSeeder.php` – seeder yang memuat data dari backup.
- `resources/views/home.blade.php` – halaman utama dengan komponen interaktif.
- `resources/views/layouts/app.blade.php` – layout dasar + navbar + footer.

## Skrip NPM

- `npm run dev` – Vite dev server dengan HMR.
- `npm run build` – Build produksi.

## Lisensi

Proyek ini menggunakan lisensi MIT. Lihat berkas `LICENSE` jika tersedia.
