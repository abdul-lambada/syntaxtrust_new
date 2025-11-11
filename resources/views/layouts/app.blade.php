<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SyntaxTrust — Jasa Pembuatan Website</title>
    <meta name="description" content="SyntaxTrust menyediakan jasa pembuatan website tugas kuliah, modifikasi website, dan pembuatan website dari nol dengan harga yang dapat dinegosiasikan sesuai proyek dan tingkat kesulitan.">
    @php($__setting = \App\Models\SiteSetting::where('is_active',true)->latest('id')->first())
    @php($__favicon = $__setting && $__setting->logo_path ? (\Illuminate\Support\Str::startsWith($__setting->logo_path, ['http://','https://','/']) ? $__setting->logo_path : \Illuminate\Support\Facades\Storage::url($__setting->logo_path)) : '/favicon.svg')
    <link rel="icon" href="{{ $__favicon }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <meta property="og:title" content="SyntaxTrust — Jasa Pembuatan & Modifikasi Website">
    <meta property="og:description" content="Jasa pembuatan website tugas kuliah, modifikasi website, dan website dari nol. Harga fleksibel sesuai scope & kompleksitas.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:image" content="/og-image.svg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SyntaxTrust — Jasa Pembuatan & Modifikasi Website">
    <meta name="twitter:description" content="Jasa pembuatan website tugas kuliah, modifikasi, dan dari nol. Harga fleksibel.">
    <meta name="twitter:image" content="/og-image.svg">
    @vite(['resources/css/app.css','resources/js/app.js'])
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
<body class="font-sans antialiased bg-neutral-50 text-neutral-900">
    <header x-data="{open:false, sc:false, progress:0, update(){ const doc=document.documentElement; const h=doc.scrollHeight-window.innerHeight; this.progress = h>0 ? Math.min(100, Math.max(0, (window.scrollY/h)*100)) : 0; this.sc = window.scrollY > 10; }, init(){ this.update(); window.addEventListener('resize', () => this.update()); }}" x-init="init()" @scroll.window="update()" :class="sc ? 'shadow-sm' : ''" class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-neutral-200 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                @php($__setting = \App\Models\SiteSetting::where('is_active',true)->latest('id')->first())
                @php($__logo = $__setting && $__setting->logo_path ? (\Illuminate\Support\Str::startsWith($__setting->logo_path, ['http://','https://','/']) ? $__setting->logo_path : \Illuminate\Support\Facades\Storage::url($__setting->logo_path)) : null)
                @php($__siteName = trim($__setting->site_name ?? '') ?: 'SyntaxTrust')
                @php($__initial = \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($__siteName,0,1)))
                <a href="/" class="flex items-center gap-3">
                    @if($__logo)
                        <img src="{{ $__logo }}" alt="logo" class="h-9 w-auto">
                    @else
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-600 text-white text-lg">{{ $__initial }}</span>
                    @endif
                    <span class="text-lg font-semibold text-neutral-900">{{ $__siteName }}</span>
                </a>
                <nav class="hidden md:flex items-center gap-8">
                    <a data-nav href="/" class="group relative">Beranda<span class="nav-underline absolute left-0 -bottom-1 h-0.5 w-0 bg-indigo-600 transition-all group-hover:w-full"></span></a>
                    <a data-nav href="#layanan" class="group relative">Layanan<span class="nav-underline absolute left-0 -bottom-1 h-0.5 w-0 bg-indigo-600 transition-all group-hover:w-full"></span></a>
                    <a data-nav href="#jadwal" class="group relative">Jadwal<span class="nav-underline absolute left-0 -bottom-1 h-0.5 w-0 bg-indigo-600 transition-all group-hover:w-full"></span></a>
                    <a data-nav href="#kontak" class="ml-2 px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-500">Mulai Proyek</a>
                </nav>
                <button @click="open=!open" class="md:hidden inline-flex items-center justify-center h-10 w-10 rounded-lg border border-neutral-300">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div x-show="open" x-transition.opacity class="md:hidden fixed inset-0 z-40">
                <div @click="open=false" class="absolute inset-0 bg-black/30"></div>
                <div class="absolute right-0 top-0 h-full w-72 bg-white shadow-xl p-6 flex flex-col gap-3">
                    <a data-nav @click="open=false" href="/" class="py-2">Beranda</a>
                    <a data-nav @click="open=false" href="#layanan" class="py-2">Layanan</a>
                    <a data-nav @click="open=false" href="#jadwal" class="py-2">Jadwal</a>
                    <a data-nav @click="open=false" href="#kontak" class="mt-2 py-2 px-3 rounded-lg bg-indigo-600 text-white text-center">Mulai Proyek</a>
                </div>
            </div>
        </div>
        <div class="absolute left-0 bottom-0 h-0.5 bg-gradient-to-r from-indigo-500 via-fuchsia-500 to-cyan-400 transition-all duration-200" :style="`width:${progress}%; opacity:${progress>1?1:0}`"></div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-neutral-200 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid gap-8 md:grid-cols-4">
            <div>
                <div class="flex items-center gap-2">
                    @php($__setting = \App\Models\SiteSetting::where('is_active',true)->latest('id')->first())
                    @php($__logo = $__setting && $__setting->logo_path ? (\Illuminate\Support\Str::startsWith($__setting->logo_path, ['http://','https://','/']) ? $__setting->logo_path : \Illuminate\Support\Facades\Storage::url($__setting->logo_path)) : null)
                    @php($__siteName = trim($__setting->site_name ?? '') ?: 'SyntaxTrust')
                    @php($__initial = \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($__siteName,0,1)))
                    @if($__logo)
                        <img src="{{ $__logo }}" alt="logo" class="h-8 w-auto">
                    @else
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-600 text-white text-sm">{{ $__initial }}</span>
                    @endif
                    <span class="font-semibold text-neutral-900">{{ $__siteName }}</span>
                </div>
                <p class="text-sm text-neutral-600 mt-3">Jasa pembuatan dan modifikasi website. Harga fleksibel sesuai kebutuhan proyek.</p>
            </div>
            <div class="text-sm">
                <div class="font-medium mb-3">Navigasi</div>
                <ul class="space-y-2">
                    <li><a href="#layanan" class="hover:text-indigo-600">Layanan</a></li>
                    <li><a href="#faq" class="hover:text-indigo-600">FAQ</a></li>
                </ul>
            </div>
            <div class="text-sm">
                <div class="font-medium mb-3">Kontak</div>
                <ul class="space-y-2">
                    <li>Email: engineertekno@gmail.com</li>
                    <li>WhatsApp: 085156553226</li>
                </ul>
            </div>
            <div class="text-sm" x-data="{
                email:'', submitting:false, success:false, error:'',
                validate(){ const re=/^[\w.!#$%&'*+/=?^`{|}~-]+@[\w-]+(?:\.[\w-]+)+$/; return re.test(this.email.trim()); },
                submit(){ this.error=''; if(this.submitting) return; if(!this.validate()){ this.error='Masukkan email yang valid.'; return; } this.submitting=true; setTimeout(()=>{ this.submitting=false; this.success=true; this.email=''; setTimeout(()=>this.success=false, 2500); }, 900); }
            }">
                <div class="font-medium mb-3">Newsletter</div>
                <p class="text-neutral-600 text-sm">Dapatkan update fitur & tips pengembangan langsung ke email Anda.</p>
                <form @submit.prevent="submit()" class="mt-4 space-y-2">
                    <div class="relative">
                        <input x-model="email" type="email" placeholder="nama@email.com" class="w-full rounded-lg border px-3 py-2 pr-28 focus:ring-2 focus:ring-indigo-200" :class="error ? 'border-red-400' : 'border-neutral-300'">
                        <button type="submit" class="absolute right-1 top-1 bottom-1 px-3 rounded-lg bg-indigo-600 text-white text-xs font-semibold hover:bg-indigo-500 transition" :class="submitting ? 'opacity-70 cursor-not-allowed' : ''">
                            <span x-show="!submitting">Daftar</span>
                            <span x-show="submitting" class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-3.5 w-3.5 animate-spin" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10" stroke-width="2" class="opacity-20"></circle><path d="M4 12a8 8 0 0 1 8-8" stroke-width="2" stroke-linecap="round" class="opacity-70"></path></svg>Proses</span>
                        </button>
                    </div>
                    <p x-show="error" class="text-xs text-red-500" x-text="error"></p>
                    <p x-show="success" x-transition class="text-xs text-emerald-600">Berhasil! Cek inbox Anda untuk konfirmasi.</p>
                </form>
            </div>
        </div>
        <div class="text-center text-xs text-neutral-500 py-6">  <span x-data="{y:new Date().getFullYear()}" x-text="y"></span> SyntaxTrust. All rights reserved.</div>
    </footer>

    <!-- Promo/Discount Popup -->
    <div x-data="{open:false, dont:false, promoEndsAt: new Date('2025-12-31T23:59:59').getTime(),
            shouldOpen(){ try{ const t=Number(localStorage.getItem('promoDismissUntil')); const now=Date.now(); if(now>this.promoEndsAt) return false; return (!t || now>t); }catch(e){ return true } },
            dismiss(){ if(this.dont){ try{ localStorage.setItem('promoDismissUntil', String(Date.now()+24*60*60*1000)); }catch(e){} } this.open=false; }
        }"
         x-init="(() => { if(shouldOpen()) { setTimeout(()=>open=true, 600); } })()">
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[100] bg-black/50"></div>
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-3 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-3 scale-95"
             class="fixed inset-0 z-[110] grid place-items-center p-4" role="dialog" aria-modal="true">
            <div class="w-full max-w-md rounded-2xl bg-white shadow-2xl border border-neutral-200 overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-600 to-violet-600 text-white px-5 py-3 flex items-center justify-between">
                    <div class="font-semibold">Promo Spesial</div>
                    <button @click="dismiss()" aria-label="Tutup" class="h-8 w-8 grid place-items-center rounded-md hover:bg-white/10">✕</button>
                </div>
                <div class="p-5 space-y-4">
                    <div class="text-lg font-semibold">Diskon hingga 15% untuk project pertama!</div>
                    <p class="text-sm text-neutral-600">Klaim promo ini dengan menjadwalkan pertemuan atau chat WhatsApp sekarang. Berlaku terbatas.</p>
                    <div class="flex gap-3">
                        <button @click="dismiss(); document.querySelector('#jadwal')?.scrollIntoView({behavior:'smooth'})" class="flex-1 px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-500">Jadwalkan Sekarang</button>
                        <button @click="window.open(`https://wa.me/${window.WHATSAPP_NUMBER||'6285156553226'}?text=Halo%20SyntaxTrust%2C%20saya%20ingin%20klaim%20promo`, '_blank'); dismiss();" class="flex-1 px-4 py-2 rounded-lg border border-neutral-300 hover:bg-neutral-50">Chat WhatsApp</button>
                    </div>
                    <label class="mt-2 inline-flex items-center gap-2 text-xs text-neutral-600 select-none">
                        <input type="checkbox" x-model="dont" class="rounded border-neutral-300">
                        Jangan tampil lagi hari ini
                    </label>
                    <div class="text-[11px] text-neutral-400">Berlaku s/d <span x-text="new Date(promoEndsAt).toLocaleDateString('id-ID')"></span></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to top -->
    <button x-data="{show:false}" @scroll.window="show = window.scrollY > 300" x-show="show" @click="window.scrollTo({top:0, behavior:'smooth'})"
        class="hidden sm:inline-flex fixed bottom-5 right-5 z-50 mr-16 h-11 w-11 items-center justify-center rounded-full border border-neutral-200 bg-white text-neutral-700 shadow-md hover:shadow transition" aria-label="Back to top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
    </button>

    <!-- Floating WhatsApp CTA -->
    <div x-data="{open:false}" @keydown.escape.window="open=false" class="fixed bottom-20 right-4 sm:bottom-5 sm:right-5 z-50" data-wa="6285156553226">
        <div class="flex items-center gap-2 justify-end">
            <div class="flex gap-2" x-show="open" x-transition.opacity x-transition.scale.origin.right>
                <a href="https://wa.me/6285156553226?text=Halo%20SyntaxTrust%2C%20saya%20ingin%20konsultasi%20pembuatan%20website" target="_blank" class="inline-flex items-center gap-2 rounded-full bg-white text-emerald-700 border border-emerald-200 px-3 py-2 shadow hover:bg-emerald-50 transition" aria-label="Chat sekarang">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><path d="M20.52 3.48A11.94 11.94 0 0 0 12.05 0C5.44 0 .1 5.34.1 11.94c0 2.1.55 4.13 1.58 5.94L0 24l6.27-1.64a12.02 12.02 0 0 0 5.78 1.47h.01c6.6 0 11.94-5.34 11.94-11.94 0-3.19-1.24-6.19-3.48-8.41ZM12.05 22.1h-.01a10.2 10.2 0 0 1-5.2-1.44l-.37-.22-3.72.97.99-3.63-.24-.37a10.17 10.17 0 0 1-1.6-5.47c0-5.62 4.58-10.2 10.21-10.2 2.73 0 5.29 1.06 7.22 2.99a10.14 10.14 0 0 1 2.98 7.21c0 5.63-4.57 10.2-10.21 10.2Zm5.84-7.65c-.32-.16-1.9-.94-2.2-1.04-.29-.1-.5-.16-.72.16-.21.32-.83 1.03-1.02 1.25-.19.21-.38.24-.7.08-.32-.16-1.34-.49-2.55-1.57-.94-.84-1.57-1.88-1.76-2.2-.18-.32-.02-.49.14-.65.15-.15.32-.38.48-.57.16-.19.21-.32.32-.54.11-.21.05-.4-.02-.56-.16-.16-.71-1.7-.97-2.32-.25-.6-.51-.52-.72-.53l-.61-.01c-.21 0-.55.08-.83.4-.29.32-1.1 1.08-1.1 2.63 0 1.54 1.13 3.03 1.28 3.24.16.21 2.22 3.4 5.38 4.76.75.32 1.33.51 1.79.66.75.24 1.43.2 1.97.12.6-.09 1.9-.78 2.17-1.55Z"/></svg>
                    <span class="text-sm">Chat sekarang</span>
                </a>
                <a href="https://wa.me/6285156553226?text=Halo%20SyntaxTrust%2C%20tolong%20buatkan%20estimasi%20biaya%20untuk%20proyek%20saya" target="_blank" class="inline-flex items-center gap-2 rounded-full bg-emerald-600 text-white px-3 py-2 shadow hover:bg-emerald-500 transition" aria-label="Minta estimasi">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span class="text-sm">Minta estimasi</span>
                </a>
            </div>

            <button @click="open=!open" @click.outside="open=false" aria-label="Buka menu WhatsApp"
                class="group relative inline-flex items-center rounded-full bg-emerald-500 text-white shadow-lg hover:bg-emerald-600 focus:outline-none focus:ring-4 focus:ring-emerald-500/30 active:scale-[0.98] transition">
                <span class="absolute -inset-1 -z-10 rounded-full bg-emerald-500/40 blur-lg opacity-0 group-hover:opacity-100 transition"></span>
                <div class="relative h-11 w-11 grid place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M20.52 3.48A11.94 11.94 0 0 0 12.05 0C5.44 0 .1 5.34.1 11.94c0 2.1.55 4.13 1.58 5.94L0 24l6.27-1.64a12.02 12.02 0 0 0 5.78 1.47h.01c6.6 0 11.94-5.34 11.94-11.94 0-3.19-1.24-6.19-3.48-8.41ZM12.05 22.1h-.01a10.2 10.2 0 0 1-5.2-1.44l-.37-.22-3.72.97.99-3.63-.24-.37a10.17 10.17 0 0 1-1.6-5.47c0-5.62 4.58-10.2 10.21-10.2 2.73 0 5.29 1.06 7.22 2.99a10.14 10.14 0 0 1 2.98 7.21c0 5.63-4.57 10.2-10.21 10.2Zm5.84-7.65c-.32-.16-1.9-.94-2.2-1.04-.29-.1-.5-.16-.72.16-.21.32-.83 1.03-1.02 1.25-.19.21-.38.24-.7.08-.32-.16-1.34-.49-2.55-1.57-.94-.84-1.57-1.88-1.76-2.2-.18-.32-.02-.49.14-.65.15-.15.32-.38.48-.57.16-.19.21-.32.32-.54.11-.21.05-.4-.02-.56-.16-.16-.71-1.7-.97-2.32-.25-.6-.51-.52-.72-.53l-.61-.01c-.21 0-.55.08-.83.4-.29.32-1.1 1.08-1.1 2.63 0 1.54 1.13 3.03 1.28 3.24.16.21 2.22 3.4 5.38 4.76.75.32 1.33.51 1.79.66.75.24 1.43.2 1.97.12.6-.09 1.9-.78 2.17-1.55Z"/></svg>
                    <span class="absolute -top-0.5 -right-0.5 h-2 w-2 rounded-full bg-emerald-400 animate-ping"></span>
                    <span class="absolute -top-0.5 -right-0.5 h-2 w-2 rounded-full bg-emerald-500"></span>
                </div>
                <span class="max-w-0 overflow-hidden group-hover:max-w-[140px] transition-all duration-300 whitespace-nowrap pr-4">WhatsApp</span>
            </button>
        </div>
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
            }, { threshold: 0.12 });
            els.forEach(el => io.observe(el));
            const waHost = document.querySelector('[data-wa]');
            if (waHost) {
                window.WHATSAPP_NUMBER = waHost.getAttribute('data-wa');
            }
            const sections = [
                { id: '/', el: document.body },
                { id: '#layanan', el: document.querySelector('#layanan') },
                { id: '#jadwal', el: document.querySelector('#jadwal') },
                { id: '#kontak', el: document.querySelector('#kontak') },
            ].filter(s => s.el);
            const navs = document.querySelectorAll('a[data-nav]');
            const setActive = (hash) => {
                navs.forEach(a => {
                    const active = a.getAttribute('href') === hash || (hash==='/' && a.getAttribute('href')==='/');
                    const u = a.querySelector('.nav-underline');
                    if (u) u.style.width = active ? '100%' : '0';
                    a.classList.toggle('text-indigo-600', active);
                    a.classList.toggle('font-semibold', active);
                });
            };
            const so = new IntersectionObserver((entries)=>{
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        const id = '#'+e.target.id;
                        if (id) setActive(id);
                    }
                })
            }, {threshold: 0.55, rootMargin: '-10% 0px -35% 0px'});
            sections.forEach(s=>{ if(s.el.id) so.observe(s.el); });
            document.querySelectorAll('a[href^="#"]').forEach(a=>{
                a.addEventListener('click', (ev)=>{
                    const id = a.getAttribute('href');
                    const target = document.querySelector(id);
                    if (target) {
                        ev.preventDefault();
                        target.scrollIntoView({behavior:'smooth'});
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
