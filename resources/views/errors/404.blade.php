@extends('layouts.app')

@section('content')
<section class="min-h-[60vh] grid place-items-center bg-white">
    <div class="text-center px-6">
        <div class="inline-flex items-center justify-center h-16 w-16 rounded-2xl bg-neutral-100 text-neutral-700">404</div>
        <h1 class="mt-4 text-2xl font-bold">Halaman tidak ditemukan</h1>
        <p class="mt-2 text-neutral-600">Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.</p>
        <div class="mt-6">
            <a href="/" class="px-5 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-500">Kembali ke Beranda</a>
        </div>
    </div>
</section>
@endsection
