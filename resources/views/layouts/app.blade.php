<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SyntaxTrust — Jasa Pembuatan Website</title>
    <meta name="description"
        content="SyntaxTrust menyediakan jasa pembuatan website tugas kuliah, modifikasi website, dan pembuatan website dari nol dengan harga yang dapat dinegosiasikan sesuai proyek dan tingkat kesulitan.">
    @php($__setting = \App\Models\SiteSetting::where('is_active', true)->latest('id')->first())
    @php($__favicon = $__setting && $__setting->logo_path ? (\Illuminate\Support\Str::startsWith($__setting->logo_path, ['http://', 'https://', '/']) ? $__setting->logo_path : \Illuminate\Support\Facades\Storage::url($__setting->logo_path)) : '/favicon.svg')
    <link rel="icon" href="{{ $__favicon }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <meta property="og:title" content="SyntaxTrust — Jasa Pembuatan & Modifikasi Website">
    <meta property="og:description"
        content="Jasa pembuatan website tugas kuliah, modifikasi website, dan website dari nol. Harga fleksibel sesuai scope & kompleksitas.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:image" content="/og-image.svg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SyntaxTrust — Jasa Pembuatan & Modifikasi Website">
    <meta name="twitter:description"
        content="Jasa pembuatan website tugas kuliah, modifikasi, dan dari nol. Harga fleksibel.">
    <meta name="twitter:image" content="/og-image.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .theme-night {
            background-color: #020617;
            color: #e2e8f0;
        }

        .theme-night .bg-white {
            background-color: rgba(15, 23, 42, 0.85);
        }

        .theme-night .bg-white\/95 {
            background-color: rgba(15, 23, 42, 0.9);
        }

        .theme-night .bg-white\/90 {
            background-color: rgba(15, 23, 42, 0.85);
        }

        .theme-night .bg-white\/80 {
            background-color: rgba(15, 23, 42, 0.75);
        }

        .theme-night .bg-neutral-50,
        .theme-night .bg-white\/70 {
            background-color: rgba(15, 23, 42, 0.65);
        }

        .theme-night .border-neutral-200 {
            border-color: rgba(148, 163, 184, 0.25);
        }

        .theme-night .border-neutral-300 {
            border-color: rgba(148, 163, 184, 0.35);
        }

        .theme-night .text-neutral-900 {
            color: #e2e8f0;
        }

        .theme-night .text-neutral-700 {
            color: #cbd5f5;
        }

        .theme-night .text-neutral-600,
        .theme-night .text-neutral-500 {
            color: #a5b4fc;
        }

        .theme-night .text-neutral-400 {
            color: #94a3b8;
        }

        .theme-night .shadow-xl,
        .theme-night .shadow-lg,
        .theme-night .shadow-md {
            box-shadow: 0 30px 60px -30px rgba(14, 116, 144, 0.35);
        }

        .theme-night .nav-underline {
            background-color: rgba(165, 180, 252, 0.95);
        }
    </style>
    <script src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="font-sans antialiased bg-neutral-50 text-neutral-900 overflow-x-hidden" x-data="{
    mobileMenuOpen: false,
    sc: false,
    progress: 0,
    update() {
        const doc = document.documentElement;
        const h = doc.scrollHeight - window.innerHeight;
        this.progress = h > 0 ? Math.min(100, Math.max(0, (window.scrollY / h) * 100)) : 0;
        this.sc = window.scrollY > 10;
    },
    init() {
        this.update();
        window.addEventListener('resize', () => this.update());
    }
}"
    x-init="init()" @scroll.window="update()">
    <!-- Urgency Banner Lead Magnet -->
    <div x-data="{
        timeLeft: '',
        slots: 2,
        calc() {
            const now = new Date();
            const end = new Date();
            end.setHours(23, 59, 59);
            const diff = end - now;
            const h = Math.floor(diff / 3600000);
            const m = Math.floor((diff % 3600000) / 60000);
            const s = Math.floor((diff % 60000) / 1000);
            this.timeLeft = `${h}j ${m}m ${s}p`;
        },
        init() {
            this.calc();
            setInterval(() => this.calc(), 1000);
            // Simulate slot decrement occasionally for psychological effect
            setTimeout(() => { if (this.slots > 1) this.slots-- }, 15000);
        }
    }" x-init="init()"
        class="bg-linear-to-r from-indigo-700 via-indigo-600 to-violet-700 text-white py-2 px-4 shadow-lg overflow-hidden relative group">
        <div
            class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-center gap-2 sm:gap-6 text-center sm:text-left relative z-10">
            <div class="flex items-center gap-2">
                <span
                    class="inline-flex items-center justify-center bg-white/20 rounded-full px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider animate-pulse">Hot
                    Offer</span>
                <p class="text-sm font-medium">Konsultasi Gratis & Audit Website (15 Menit)</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="hidden md:flex items-center gap-1.5 text-indigo-100 text-xs border-x border-white/20 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Berakhir dalam: <span x-text="timeLeft" class="font-mono font-bold text-white"></span>
                </div>
                <div class="flex items-center gap-2">
                    <p class="text-[11px] sm:text-xs">Sisa <span
                            class="bg-amber-400 text-indigo-900 px-1.5 py-0.5 rounded font-bold" x-text="slots"></span>
                        slot hari ini!</p>
                    <a href="https://wa.me/6285156553226?text=Halo%20SyntaxTrust%2C%20saya%20ingin%20ambil%20slot%20Konsultasi%20Gratis%20dan%20Audit%20Website"
                        class="bg-white text-indigo-700 px-3 py-1 rounded-md text-xs font-bold hover:bg-indigo-50 transition-colors shadow-sm">Klaim
                        Sekarang</a>
                </div>
            </div>
        </div>
        <div
            class="absolute inset-0 bg-white/10 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-in-out skew-x-[-20deg]">
        </div>
    </div>

    <header :class="sc ? 'shadow-sm' : ''"
        class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-neutral-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                @php($__setting = \App\Models\SiteSetting::where('is_active', true)->latest('id')->first())
                @php($__logo = $__setting && $__setting->logo_path ? (\Illuminate\Support\Str::startsWith($__setting->logo_path, ['http://', 'https://', '/']) ? $__setting->logo_path : \Illuminate\Support\Facades\Storage::url($__setting->logo_path)) : null)
                @php($__siteName = trim($__setting->site_name ?? '') ?: 'SyntaxTrust')
                @php($__initial = \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($__siteName, 0, 1)))
                <a href="/" class="flex items-center gap-3">
                    @if ($__logo)
                        <img src="{{ $__logo }}" alt="logo" class="h-9 w-auto">
                    @else
                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-600 text-white text-lg">{{ $__initial }}</span>
                    @endif
                    <span class="text-lg font-semibold text-neutral-900">{{ $__siteName }}</span>
                </a>
                <nav class="hidden md:flex items-center gap-8">
                    <a data-nav href="/" class="group relative">Beranda<span
                            class="nav-underline absolute left-0 -bottom-1 h-0.5 w-0 bg-indigo-600 transition-all group-hover:w-full"></span></a>
                    <a data-nav href="#layanan" class="group relative">Layanan<span
                            class="nav-underline absolute left-0 -bottom-1 h-0.5 w-0 bg-indigo-600 transition-all group-hover:w-full"></span></a>
                    <a data-nav href="#portofolio" class="group relative">Portofolio<span
                            class="nav-underline absolute left-0 -bottom-1 h-0.5 w-0 bg-indigo-600 transition-all group-hover:w-full"></span></a>
                    <a data-nav href="#pricing" class="group relative">Harga<span
                            class="nav-underline absolute left-0 -bottom-1 h-0.5 w-0 bg-indigo-600 transition-all group-hover:w-full"></span></a>
                    <a data-nav href="#jadwal" class="group relative">Jadwal<span
                            class="nav-underline absolute left-0 -bottom-1 h-0.5 w-0 bg-indigo-600 transition-all group-hover:w-full"></span></a>
                    <a data-nav href="#kontak"
                        class="ml-2 px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-500">Mulai Proyek</a>
                </nav>
                <button @click="mobileMenuOpen = !mobileMenuOpen" <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="md:hidden inline-flex items-center justify-center h-10 w-10 text-neutral-900 rounded-lg border border-neutral-300 hover:bg-neutral-100 transition z-50 relative">
                    <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
        <div class="absolute left-0 bottom-0 h-0.5 bg-linear-to-r from-indigo-500 via-fuchsia-500 to-cyan-400 transition-all duration-200"
            :style="`width:${progress}%; opacity:${progress>1?1:0}`"></div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen" style="display: none;" x-transition.opacity class="fixed inset-0 z-100 md:hidden">
        <!-- Backdrop -->
        <div @click="mobileMenuOpen = false" class="absolute inset-0 bg-neutral-900/60 backdrop-blur-sm"></div>

        <!-- Drawer -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="absolute right-0 top-0 h-full w-80 bg-white shadow-2xl p-6 flex flex-col gap-6 overflow-y-auto">

            <!-- Header of Drawer -->
            <div class="flex items-center justify-between">
                <span class="text-lg font-bold text-neutral-900">Menu</span>
                <button @click="mobileMenuOpen = false" class="p-2 -mr-2 text-neutral-500 hover:text-neutral-900">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Links -->
            <nav class="flex flex-col gap-4">
                <a data-nav @click="mobileMenuOpen=false" href="/"
                    class="text-lg font-medium text-neutral-600 hover:text-indigo-600">Beranda</a>
                <a data-nav @click="mobileMenuOpen=false" href="#layanan"
                    class="text-lg font-medium text-neutral-600 hover:text-indigo-600">Layanan</a>
                <a data-nav @click="mobileMenuOpen=false" href="#portofolio"
                    class="text-lg font-medium text-neutral-600 hover:text-indigo-600">Portofolio</a>
                <a data-nav @click="mobileMenuOpen=false" href="#pricing"
                    class="text-lg font-medium text-neutral-600 hover:text-indigo-600">Harga</a>
                <a data-nav @click="mobileMenuOpen=false" href="#jadwal"
                    class="text-lg font-medium text-neutral-600 hover:text-indigo-600">Jadwal</a>
            </nav>

            <!-- CTA -->
            <div class="mt-auto">
                <a @click="mobileMenuOpen=false" href="#kontak"
                    class="block w-full py-4 rounded-xl bg-indigo-600 text-white text-center font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
                    Mulai Proyek
                </a>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="bg-neutral-900 text-white pt-16 lg:pt-24 pb-12 overflow-hidden relative">
        <!-- Decorative Background -->
        <div class="absolute top-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-white/10 to-transparent">
        </div>
        <div class="absolute -bottom-24 -right-24 h-64 w-64 bg-indigo-600/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-16 lg:gap-8">
                <!-- Brand Section -->
                <div class="lg:col-span-4 space-y-8">
                    <div class="flex items-center gap-3">
                        @php($__setting = \App\Models\SiteSetting::where('is_active', true)->latest('id')->first())
                        @php($__logo = $__setting && $__setting->logo_path ? (\Illuminate\Support\Str::startsWith($__setting->logo_path, ['http://', 'https://', '/']) ? $__setting->logo_path : \Illuminate\Support\Facades\Storage::url($__setting->logo_path)) : null)
                        @php($__siteName = trim($__setting->site_name ?? '') ?: 'SyntaxTrust')
                        @php($__initial = \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($__siteName, 0, 1)))
                        @if ($__logo)
                            <img src="{{ $__logo }}" alt="logo" class="h-10 w-auto">
                        @else
                            <div
                                class="h-10 w-10 rounded-xl bg-indigo-600 flex items-center justify-center font-bold text-xl">
                                {{ $__initial }}</div>
                        @endif
                        <span class="text-2xl font-extrabold tracking-tight">{{ $__siteName }}</span>
                    </div>
                    <p class="text-neutral-400 leading-relaxed max-w-sm">
                        Partner terpercaya untuk transformasi digital. Kami membangun website performa tinggi dengan
                        teknologi modern dan desain yang memikat.
                    </p>
                    <div class="flex items-center gap-4">
                        <a href="#"
                            class="h-10 w-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-indigo-600 transition-colors"
                            aria-label="Facebook">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="h-10 w-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-indigo-600 transition-colors"
                            aria-label="Instagram">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.88 1.44 1.44 0 000-2.88z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="h-10 w-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-indigo-600 transition-colors"
                            aria-label="LinkedIn">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="lg:col-span-2 space-y-6">
                    <h4 class="text-sm font-bold uppercase tracking-[0.2em] text-indigo-400">Navigasi</h4>
                    <ul class="space-y-4">
                        <li><a href="#layanan"
                                class="text-neutral-400 hover:text-white hover:translate-x-1 transition-all inline-block">Layanan
                                Kami</a></li>
                        <li><a href="#jadwal"
                                class="text-neutral-400 hover:text-white hover:translate-x-1 transition-all inline-block">Jadwalkan
                                Konsultasi</a></li>
                        <li><a href="#kontak"
                                class="text-neutral-400 hover:text-white hover:translate-x-1 transition-all inline-block">Hubungi
                                Kami</a></li>
                        <li><a href="#faq"
                                class="text-neutral-400 hover:text-white hover:translate-x-1 transition-all inline-block">Tanya
                                Jawab (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Contact Links -->
                <div class="lg:col-span-3 space-y-6">
                    <h4 class="text-sm font-bold uppercase tracking-[0.2em] text-indigo-400">Kontak Resmi</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="h-5 w-5 text-neutral-500 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-neutral-400">engineertekno@gmail.com</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="h-5 w-5 text-neutral-500 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-neutral-400">+62 851 5655 3226</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="h-5 w-5 text-neutral-500 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-neutral-400">Jawa Barat, Indonesia</span>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter Section -->
                <div class="lg:col-span-3 space-y-6" x-data="{
                    email: '',
                    submitting: false,
                    success: false,
                    error: '',
                    validate() { const re = /^[\w.!#$%&'*+/=?^`{|}~-]+@[\w-]+(?:\.[\w-]+)+$/; return re.test(this.email.trim()); },
                    submit() {
                        this.error = '';
                        if (this.submitting) return;
                        if (!this.validate()) { this.error = 'Email tidak valid.'; return; }
                        this.submitting = true;
                        setTimeout(() => {
                            this.submitting = false;
                            this.success = true;
                            this.email = '';
                            setTimeout(() => this.success = false, 3500);
                        }, 1200);
                    }
                }">
                    <h4 class="text-sm font-bold uppercase tracking-[0.2em] text-indigo-400">Newsletter</h4>
                    <p class="text-neutral-400 text-sm leading-relaxed">Dapatkan update teknologi terbaru dan penawaran
                        spesial.</p>
                    <form @submit.prevent="submit()" class="space-y-3">
                        <div class="relative group">
                            <input x-model="email" type="email" placeholder="email@contoh.com"
                                class="w-full h-12 bg-white/5 border border-white/10 rounded-xl px-4 text-sm focus:outline-hidden focus:border-indigo-500 focus:bg-white/10 transition-all"
                                :class="error ? 'border-red-400' : ''">
                            <button type="submit"
                                class="absolute right-1 top-1 bottom-1 px-4 rounded-lg bg-indigo-600 text-xs font-bold hover:bg-indigo-500 transition-colors disabled:opacity-50"
                                :disabled="submitting">
                                <span x-show="!submitting">Join</span>
                                <svg x-show="submitting" class="animate-spin h-3.5 w-3.5" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <p x-show="error" class="text-[10px] text-red-400 ml-1 font-bold" x-text="error"></p>
                        <p x-show="success" x-transition class="text-[10px] text-emerald-400 ml-1 font-bold">Terima
                            kasih! Cek email Anda segera.</p>
                    </form>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div
                class="mt-20 pt-8 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-6">
                <p class="text-xs text-neutral-500">
                    &copy; <span x-data="{ y: new Date().getFullYear() }" x-text="y"></span> SyntaxTrust. Seluruh hak cipta
                    dilindungi.
                </p>
                <div class="flex items-center gap-8 text-xs text-neutral-500">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Promo/Discount Popup (Dynamic) -->
    @if (isset($promo) && $promo)
        <div x-data="{
            open: false,
            dont: false,
            promoId: '{{ $promo->id }}',
            promoEndsAt: new Date('{{ $promo->ends_at?->toIso8601String() ?? now()->addDays(7)->toIso8601String() }}').getTime(),
            shouldOpen() {
                try {
                    const dismissed = localStorage.getItem('promo_dismissed_' + this.promoId);
                    const now = Date.now();
                    if (dismissed && now < Number(dismissed)) return false;
                    if (now > this.promoEndsAt) return false;
                    return true;
                } catch (e) { return true }
            },
            dismiss() {
                if (this.dont) {
                    try {
                        localStorage.setItem('promo_dismissed_' + this.promoId, String(Date.now() + 24 * 60 * 60 * 1000));
                    } catch (e) {}
                }
                this.open = false;
            }
        }" x-init="(() => { if (shouldOpen()) { setTimeout(() => open = true, 1500); } })()">
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 z-100 bg-slate-900/60 backdrop-blur-sm"
                @click="dismiss()"></div>

            <div x-show="open"
                x-transition:enter="transition ease-out duration-500 cubic-bezier(0.34, 1.56, 0.64, 1)"
                x-transition:enter-start="opacity-0 translate-y-12 scale-90"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="fixed inset-0 z-110 grid place-items-center p-4 pointer-events-none" role="dialog"
                aria-modal="true">

                <div
                    class="w-full max-w-[440px] rounded-[32px] bg-white shadow-[0_32px_64px_-16px_rgba(79,70,229,0.4)] border border-neutral-100 overflow-hidden pointer-events-auto relative">
                    <!-- Header with Gradient and Micro-animation -->
                    <div
                        class="bg-linear-to-br from-indigo-600 via-indigo-700 to-violet-800 text-white p-8 text-center relative overflow-hidden">
                        <div class="absolute inset-0 opacity-10">
                            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <path d="M0 100 C 20 0 50 0 100 100 Z" fill="currentColor"></path>
                            </svg>
                        </div>

                        <div
                            class="inline-flex items-center justify-center bg-white/20 backdrop-blur-md rounded-full px-4 py-1.5 text-[11px] font-bold uppercase tracking-[0.2em] mb-4 border border-white/10 animate-pulse">
                            Saran Penawaran
                        </div>

                        <h3 class="text-3xl font-extrabold tracking-tight leading-tight mb-2">{{ $promo->title }}</h3>
                        <div class="h-1 w-12 bg-amber-400 mx-auto rounded-full mb-4"></div>
                    </div>

                    <div class="p-8 space-y-6">
                        <div class="relative">
                            <div class="absolute -left-4 -top-4 text-6xl text-indigo-50 opacity-50 font-serif">“</div>
                            <p class="text-neutral-600 leading-relaxed relative z-10 italic">
                                {{ $promo->description }}
                            </p>
                        </div>

                        <div class="bg-indigo-50/50 rounded-2xl p-4 border border-indigo-100 flex items-center gap-4">
                            <div
                                class="h-12 w-12 rounded-xl bg-white shadow-sm flex items-center justify-center text-2xl">
                                🎁
                            </div>
                            <div>
                                <div class="text-xs text-indigo-600 font-bold uppercase tracking-wider">Potongan Harga
                                </div>
                                <div class="text-lg font-bold text-neutral-900">
                                    @if ($promo->discount_type === 'percent')
                                        Diskon {{ number_format($promo->amount, 0) }}%
                                    @else
                                        Potongan Rp {{ number_format($promo->amount, 0, ',', '.') }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <a href="https://wa.me/{{ preg_replace('/\D/', '', $__setting->whatsapp ?? '6285156553226') }}?text={{ urlencode('Halo SyntaxTrust, saya ingin klaim ' . $promo->title) }}"
                                @click="dismiss()" target="_blank"
                                class="flex items-center justify-center gap-2 w-full py-4 rounded-2xl bg-indigo-600 text-white font-bold text-lg hover:bg-indigo-700 transition-all hover:-translate-y-1 shadow-xl shadow-indigo-200">
                                <span>Klaim Via WhatsApp</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                            <button @click="dismiss()"
                                class="w-full py-3 rounded-xl border border-neutral-200 text-neutral-500 font-medium hover:bg-neutral-50 transition-colors">
                                Nanti Saja
                            </button>
                        </div>

                        <div class="flex items-center justify-between pt-2 border-t border-neutral-100">
                            <label
                                class="inline-flex items-center gap-2 text-xs text-neutral-400 cursor-pointer group">
                                <input type="checkbox" x-model="dont"
                                    class="rounded border-neutral-300 text-indigo-600 focus:ring-indigo-500">
                                <span class="group-hover:text-neutral-600 transition-colors">Jangan tampilkan
                                    lagi</span>
                            </label>
                            <div class="text-[10px] font-bold text-neutral-300 uppercase tracking-widest">
                                Ends: <span
                                    x-text="new Date(promoEndsAt).toLocaleDateString('id-ID', {day:'numeric', month:'short'})"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Close Button Floating -->
                    <button @click="dismiss()"
                        class="absolute top-4 right-4 h-10 w-10 rounded-full bg-black/10 text-white flex items-center justify-center hover:bg-black/20 transition-colors z-20"
                        aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5">
                            <path d="M18 6 6 18M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Back to top -->
    <button x-data="{ show: false }" @scroll.window="show = window.scrollY > 300" x-show="show"
        @click="window.scrollTo({top:0, behavior:'smooth'})"
        class="hidden sm:inline-flex fixed bottom-5 right-5 z-50 h-11 w-11 items-center justify-center rounded-full border border-neutral-200 bg-white text-neutral-700 shadow-md hover:shadow transition"
        aria-label="Back to top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            class="h-5 w-5">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <!-- Advanced WhatsApp Widget -->
    <div x-data="{
        open: false,
        ping: true,
        typing: false,
        messages: [],
        showChat: false,
        showTeaser: false,
        sound: new Audio('https://assets.mixkit.co/active_storage/sfx/2354/2354-preview.mp3'),
        waNumber: '{{ preg_replace('/\D/', '', $__setting->whatsapp ?? '6285156553226') }}',
        options: [
            { id: 1, text: '🚀  Ingin buat website baru', msg: 'Halo, saya tertarik membuat website baru. Bisa diskusi?' },
            { id: 2, text: '🔧  Butuh perbaikan / maintenance', msg: 'Halo, saya butuh bantuan perbaikan website.' },
            { id: 3, text: '💰  Tanya harga & paket', msg: 'Halo, boleh minta info harga dan paket layanannya?' },
            { id: 4, text: '🎓  Bantuan Skripsi / TA', msg: 'Halo, saya butuh bantuan untuk website skripsi/TA.' },
        ],
        init() {
            // Sequence: Ping -> Teaser -> Auto Open
            setTimeout(() => { if (!this.open) this.notification(); }, 3000); // 3s: Sound/Ping
            setTimeout(() => { if (!this.open) this.showTeaser = true; }, 6000); // 6s: Show Teaser
            setTimeout(() => {
                if (!this.open && !localStorage.getItem('chat_auto_opened')) {
                    this.toggle();
                    localStorage.setItem('chat_auto_opened', 'true'); // Only auto-open once per session
                }
            }, 12000); // 12s: Auto Open
        },
        notification() {
            this.ping = true;
            this.sound.volume = 0.5;
            this.sound.play().catch(e => {});
        },
        toggle() {
            this.open = !this.open;
            this.ping = false;
            this.showTeaser = false;
            if (this.open && this.messages.length === 0) {
                this.startConversation();
            }
        },
        async startConversation() {
            this.typing = true;
            await new Promise(r => setTimeout(r, 1500));
            this.typing = false;
            this.messages.push({
                type: 'bot',
                text: 'Halo! 👋 Selamat datang di SyntaxTrust.',
                time: new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
            });
            await new Promise(r => setTimeout(r, 800));
            this.typing = true;
            await new Promise(r => setTimeout(r, 1500));
            this.typing = false;
            this.messages.push({
                type: 'bot',
                text: 'Ada yang bisa saya bantu hari ini? Silakan pilih topik di bawah ini:',
                time: new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
            });
            this.showChat = true;
        },
        send(opt) {
            this.messages.push({
                type: 'user',
                text: opt.text,
                time: new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
            });
            setTimeout(() => {
                const url = `https://wa.me/${this.waNumber}?text=${encodeURIComponent(opt.msg)}`;
                window.open(url, '_blank');
            }, 800);
        }
    }" class="fixed bottom-24 right-6 z-9999 font-sans flex flex-col items-end gap-4"
        style="display: none;" x-show="true">

        <!-- Attention Teaser Bubble -->
        <div x-show="showTeaser && !open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-10 scale-90"
            x-transition:enter-end="opacity-100 translate-x-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-x-0 scale-100"
            x-transition:leave-end="opacity-0 translate-x-10 scale-90" @click="toggle()"
            class="mr-2 bg-white px-4 py-3 rounded-2xl rounded-tr-sm shadow-xl border border-indigo-100 cursor-pointer hover:bg-neutral-50 flex items-center gap-3 relative max-w-[250px] group">
            <span
                class="absolute -right-1.5 top-3 w-3 h-3 bg-white rotate-45 border-r border-t border-indigo-100"></span>
            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-lg shrink-0">
                👋
            </div>
            <div>
                <p class="text-xs font-bold text-neutral-900">Butuh bantuan?</p>
                <p class="text-[10px] text-neutral-500">Chat kami sekarang!</p>
            </div>
            <button @click.stop="showTeaser = false"
                class="absolute -top-2 -left-2 bg-white text-neutral-400 hover:text-red-500 rounded-full h-5 w-5 border border-neutral-200 shadow-sm flex items-center justify-center transition-colors">
                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Chat Window -->
        <div x-show="open" x-transition:enter="transition ease-[cubic-bezier(0.34,1.56,0.64,1)] duration-500"
            x-transition:enter-start="opacity-0 translate-y-10 scale-90"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-10 scale-90"
            class="w-[90vw] max-w-[360px] md:w-[380px] bg-white rounded-4xl shadow-2xl overflow-hidden border border-white/20 ring-1 ring-black/5 flex flex-col max-h-[calc(100vh-180px)] h-[500px] md:h-auto origin-bottom-right">

            <!-- Header with Glassmorphism -->
            <div class="h-24 bg-linear-to-br from-indigo-600 to-violet-700 relative flex items-center p-6 shrink-0">
                <div
                    class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-150">
                </div>
                <div class="relative z-10 flex items-center gap-4 w-full">
                    <div class="relative">
                        <div
                            class="h-12 w-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/30 shadow-inner">
                            <span class="text-2xl">🤖</span>
                        </div>
                        <span
                            class="absolute bottom-0 right-0 h-3.5 w-3.5 bg-emerald-400 border-[3px] border-indigo-700 rounded-full"></span>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-white tracking-wide text-lg">Support Agent</h3>
                        <p class="text-indigo-100/90 text-xs font-medium flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            Online sekarang
                        </p>
                    </div>
                    <button @click="open = false"
                        class="h-8 w-8 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Chat Area -->
            <div
                class="flex-1 bg-[#F0F2F5] p-5 overflow-y-auto custom-scrollbar scroll-smooth flex flex-col gap-4 relative">
                <!-- Background Pattern -->
                <div
                    class="absolute inset-0 opacity-[0.03] bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] pointer-events-none">
                </div>

                <!-- Date Separator -->
                <div class="text-center my-2">
                    <span
                        class="bg-neutral-200/60 text-neutral-500 text-[10px] uppercase font-bold px-3 py-1 rounded-full tracking-widest backdrop-blur-sm">
                        {{ now()->translatedFormat('l, d M') }}
                    </span>
                </div>

                <!-- Messages -->
                <template x-for="(msg, idx) in messages" :key="idx">
                    <div class="flex flex-col gap-1 w-full"
                        :class="msg.type === 'user' ? 'items-end' : 'items-start'">
                        <div class="max-w-[85%] p-3.5 text-sm leading-relaxed shadow-sm relative group transition-all duration-300 transform translate-y-0"
                            :class="msg.type === 'user' ?
                                'bg-indigo-600 text-white rounded-2xl rounded-tr-sm' :
                                'bg-white text-neutral-900 rounded-2xl rounded-tl-sm border border-neutral-100'">
                            <p x-text="msg.text"></p>
                            <span class="text-[9px] absolute bottom-1 right-2.5 opacity-60 font-medium"
                                :class="msg.type === 'user' ? 'text-indigo-100' : 'text-neutral-400'"
                                x-text="msg.time"></span>
                        </div>
                    </div>
                </template>

                <!-- Typing Component -->
                <div x-show="typing" class="flex items-center gap-2"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <div
                        class="h-8 w-8 rounded-full bg-white border border-neutral-100 flex items-center justify-center shrink-0 shadow-sm">
                        <span class="text-xs">🤖</span>
                    </div>
                    <div
                        class="bg-white px-4 py-3 rounded-2xl rounded-tl-sm shadow-sm border border-neutral-100 flex gap-1 items-center h-10">
                        <span class="w-1.5 h-1.5 bg-neutral-400 rounded-full animate-bounce"></span>
                        <span class="w-1.5 h-1.5 bg-neutral-400 rounded-full animate-bounce delay-75"></span>
                        <span class="w-1.5 h-1.5 bg-neutral-400 rounded-full animate-bounce delay-150"></span>
                    </div>
                </div>

                <!-- Options grid -->
                <div x-show="showChat" class="grid gap-2 mt-2"
                    x-transition:enter="transition ease-out duration-500 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <template x-for="opt in options" :key="opt.id">
                        <button @click="send(opt)"
                            class="text-left bg-white hover:bg-indigo-50 border border-neutral-100 hover:border-indigo-200 p-3.5 rounded-xl transition-all duration-200 group flex items-center justify-between shadow-sm hover:shadow-md hover:-translate-y-0.5">
                            <span class="text-sm font-semibold text-neutral-700 group-hover:text-indigo-700"
                                x-text="opt.text"></span>
                            <div
                                class="h-6 w-6 rounded-full bg-neutral-50 group-hover:bg-indigo-100 flex items-center justify-center text-neutral-400 group-hover:text-indigo-600 transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </button>
                    </template>
                </div>

                <!-- Bottom Spacer -->
                <div class="h-2"></div>
            </div>

            <!-- Footer Input Area (Disabled Visual) -->
            <div class="p-3 bg-white border-t border-neutral-100 shrink-0">
                <button @click="window.open(`https://wa.me/${waNumber}`, '_blank')"
                    class="w-full flex items-center justify-center gap-3 bg-[#25D366] hover:bg-[#20ba53] text-white py-3.5 rounded-xl font-bold transition-all shadow-lg hover:shadow-emerald-200 active:scale-[0.98]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                    <span>Chat Langsung di WhatsApp</span>
                </button>
            </div>
        </div>

        <!-- Main Toggle Button -->
        <button @click="toggle()"
            class="group relative h-16 w-16 rounded-full bg-[#25D366] text-white flex items-center justify-center shadow-[0_8px_30px_rgba(37,211,102,0.4)] hover:shadow-[0_8px_40px_rgba(37,211,102,0.6)] hover:-translate-y-1 hover:scale-105 transition-all duration-300 z-50 overflow-hidden">

            <!-- Ripple Effect -->
            <div class="absolute inset-0 rounded-full border border-white/40 animate-ping opacity-75" x-show="ping">
            </div>
            <div class="absolute inset-0 rounded-full border-2 border-white/20 animate-pulse delay-75" x-show="ping">
            </div>

            <!-- Notification Badge -->
            <div x-show="ping" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
                class="absolute top-0 right-0 h-5 w-5 bg-red-500 rounded-full border-2 border-white flex items-center justify-center text-[10px] font-bold z-10 shadow-sm">
                1
            </div>

            <!-- Icons with rotation animation -->
            <div class="relative w-full h-full flex items-center justify-center">
                <svg x-show="!open" x-transition:enter="transition ease-out duration-300 absolute"
                    x-transition:enter-start="opacity-0 rotate-180 scale-50"
                    x-transition:enter-end="opacity-100 rotate-0 scale-100"
                    x-transition:leave="transition ease-in duration-200 absolute"
                    x-transition:leave-start="opacity-100 rotate-0 scale-100"
                    x-transition:leave-end="opacity-0 -rotate-180 scale-50" class="h-8 w-8 drop-shadow-md"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                </svg>

                <svg x-show="open" x-transition:enter="transition ease-out duration-300 absolute"
                    x-transition:enter-start="opacity-0 -rotate-180 scale-50"
                    x-transition:enter-end="opacity-100 rotate-0 scale-100"
                    x-transition:leave="transition ease-in duration-200 absolute"
                    x-transition:leave-start="opacity-100 rotate-0 scale-100"
                    x-transition:leave-end="opacity-0 rotate-180 scale-50" class="h-8 w-8" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        </button>
    </div>

    <script>
        (() => {
            const els = document.querySelectorAll('[data-reveal]');
            if (!('IntersectionObserver' in window) || !els.length) return;
            const io = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('reveal-show');
                        io.unobserve(e.target);
                    }
                });
            }, {
                threshold: 0.12
            });
            els.forEach(el => io.observe(el));
            const waHost = document.querySelector('[data-wa]');
            if (waHost) {
                window.WHATSAPP_NUMBER = waHost.getAttribute('data-wa');
            }
            const sections = [{
                    id: '/',
                    el: document.body
                },
                {
                    id: '#layanan',
                    el: document.querySelector('#layanan')
                },
                {
                    id: '#jadwal',
                    el: document.querySelector('#jadwal')
                },
                {
                    id: '#kontak',
                    el: document.querySelector('#kontak')
                },
                {
                    id: '#portofolio',
                    el: document.querySelector('#portofolio')
                },
                {
                    id: '#pricing',
                    el: document.querySelector('#pricing')
                },
            ].filter(s => s.el);
            const navs = document.querySelectorAll('a[data-nav]');
            const setActive = (hash) => {
                navs.forEach(a => {
                    const active = a.getAttribute('href') === hash || (hash === '/' && a.getAttribute(
                        'href') === '/');
                    const u = a.querySelector('.nav-underline');
                    if (u) u.style.width = active ? '100%' : '0';

                    // Desktop & Common
                    if (active) {
                        a.classList.add('text-indigo-600', 'font-semibold');
                        a.classList.remove('text-neutral-600'); // Remove default mobile color
                    } else {
                        a.classList.remove('text-indigo-600', 'font-semibold');
                        if (a.closest('.fixed')) { // Check if inside mobile menu
                            a.classList.add('text-neutral-600');
                        }
                    }
                });
            };
            const so = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        const id = '#' + e.target.id;
                        if (id) setActive(id);
                    }
                })
            }, {
                threshold: 0.55,
                rootMargin: '-10% 0px -35% 0px'
            });
            sections.forEach(s => {
                if (s.el.id) so.observe(s.el);
            });
            document.querySelectorAll('a[href^="#"]').forEach(a => {
                a.addEventListener('click', (ev) => {
                    const id = a.getAttribute('href');
                    const target = document.querySelector(id);
                    if (target) {
                        ev.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                        setActive(id);
                    }
                });
            });
            // initial active on load
            const initHash = location.hash && document.querySelector(location.hash) ? location.hash : '/';
            setActive(initHash);
        })();
    </script>
</body>

</html>
