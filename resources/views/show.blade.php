@extends('layouts.app')

@section('content')
    <style>
        .hero-gradient {
            position: absolute;
            inset: -60% -30% auto;
            width: 200%;
            height: 200%;
            transform-origin: center;
            animation: heroGradient 25s ease-in-out infinite alternate;
            opacity: 0.8;
            filter: blur(80px);
        }

        .hero-gradient.day {
            background: radial-gradient(circle at 20% 20%, rgba(99, 102, 241, 0.25), transparent 45%),
                radial-gradient(circle at 80% 20%, rgba(129, 140, 248, 0.25), transparent 50%),
                linear-gradient(120deg, rgba(219, 234, 254, 0.5), rgba(221, 214, 254, 0.3), rgba(231, 229, 255, 0.5));
        }

        .hero-gradient.night {
            background: radial-gradient(circle at 25% 20%, rgba(129, 140, 248, 0.3), transparent 45%),
                radial-gradient(circle at 70% 80%, rgba(59, 130, 246, 0.2), transparent 55%),
                linear-gradient(140deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.85), rgba(17, 24, 39, 0.95));
            opacity: 0.6;
        }

        .hero-particle {
            position: absolute;
            border-radius: 9999px;
            mix-blend-mode: screen;
            animation-name: heroParticle;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        }

        .hero-particle.day {
            background: rgba(79, 70, 229, 0.2);
            box-shadow: 0 0 12px rgba(79, 70, 229, 0.2);
        }

        .hero-particle.night {
            background: rgba(165, 180, 252, 0.3);
            box-shadow: 0 0 18px rgba(129, 140, 248, 0.4);
        }

        @keyframes heroGradient {
            0% {
                transform: rotate(0deg) scale(1);
            }

            100% {
                transform: rotate(5deg) scale(1.1);
            }
        }

        @keyframes heroParticle {
            0% {
                transform: translate(0, 0);
                opacity: 0.3;
            }

            100% {
                transform: translate(20px, 20px);
                opacity: 0.8;
            }
        }
    </style>

    <div x-data="heroTheme()" x-init="init()" class="relative transition-colors duration-700"
        :class="theme === 'night' ? 'bg-slate-950 text-white' : 'bg-white text-neutral-900'">

        <!-- Animated Background Decor -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="hero-gradient" :class="theme"></div>
            <template x-for="p in particles" :key="p.id">
                <span :class="['hero-particle', theme]" :style="particleStyle(p)"></span>
            </template>
        </div>

        <!-- Floating Theme Toggle -->
        <button type="button" @click="toggle()"
            class="fixed bottom-6 right-24 z-50 h-12 w-12 rounded-full glass border border-neutral-200 shadow-lg flex items-center justify-center hover:scale-110 transition-transform active:scale-95"
            aria-label="Toggle Theme">
            <span class="text-xl" x-text="theme==='night' ? '☀️' : '🌙'"></span>
        </button>

        <div class="relative pt-24 pb-16 lg:pt-32 lg:pb-24 overflow-hidden z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Breadcrumb -->
                <nav class="flex mb-12" aria-label="Breadcrumb" data-reveal>
                    <ol class="inline-flex items-center space-x-1 md:space-x-4">
                        <li class="inline-flex items-center">
                            <a href="/"
                                class="inline-flex items-center text-sm font-semibold text-neutral-500 dark:text-neutral-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-neutral-300 dark:text-neutral-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                <span class="ml-2 text-sm font-bold text-indigo-600 dark:text-indigo-400">Case Study
                                    Detail</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-start">
                    <!-- Left Column: Content -->
                    <div class="space-y-10" data-reveal>
                        <div class="space-y-4">
                            <span
                                class="inline-flex items-center px-4 py-1.5 bg-indigo-50 dark:bg-indigo-900/40 text-indigo-600 dark:text-indigo-300 rounded-full text-xs font-bold tracking-widest uppercase border border-indigo-100 dark:border-indigo-800">
                                {{ $project->category ?? 'Portfolio' }}
                            </span>
                            <h1
                                class="text-4xl lg:text-6xl font-black text-neutral-900 dark:text-white tracking-tight leading-tight">
                                {{ $project->title }}
                            </h1>
                            @if ($project->client_name)
                                <div class="flex items-center gap-3 text-neutral-500 dark:text-neutral-400">
                                    <span class="h-1.5 w-8 bg-indigo-500 rounded-full"></span>
                                    <p class="text-lg font-bold">Client: <span
                                            class="text-neutral-900 dark:text-neutral-200">{{ $project->client_name }}</span>
                                    </p>
                                </div>
                            @endif
                        </div>

                        <div
                            class="prose prose-lg prose-indigo dark:prose-invert text-neutral-600 dark:text-neutral-300 leading-relaxed max-w-none">
                            {!! nl2br(e($project->description)) !!}
                        </div>

                        <!-- Case Study Stats Grid -->
                        <div class="grid grid-cols-1 gap-6 pt-6">
                            @if ($project->challenge)
                                <div class="group p-8 rounded-[2.5rem] bg-rose-50/50 dark:bg-rose-900/10 border border-rose-100 dark:border-rose-800/20 transition-all duration-300 hover:shadow-2xl hover:shadow-rose-100 dark:hover:shadow-none"
                                    data-reveal>
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="h-12 w-12 rounded-2xl bg-rose-100 dark:bg-rose-800/40 text-rose-600 dark:text-rose-400 flex items-center justify-center shadow-inner group-hover:scale-110 transition-transform">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-2xl font-extrabold text-neutral-900 dark:text-white tracking-tight">
                                            Challenge</h3>
                                    </div>
                                    <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed text-lg">
                                        {{ $project->challenge }}
                                    </p>
                                </div>
                            @endif

                            @if ($project->solution)
                                <div class="group p-8 rounded-[2.5rem] bg-indigo-50/50 dark:bg-indigo-900/10 border border-indigo-100 dark:border-indigo-800/20 transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-100 dark:hover:shadow-none"
                                    data-reveal>
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="h-12 w-12 rounded-2xl bg-indigo-100 dark:bg-indigo-800/40 text-indigo-600 dark:text-indigo-400 flex items-center justify-center shadow-inner group-hover:scale-110 transition-transform">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0012 18.75c-1.03 0-1.9.4-2.593.979l-.548-.547z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-2xl font-extrabold text-neutral-900 dark:text-white tracking-tight">
                                            Solution</h3>
                                    </div>
                                    <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed text-lg">
                                        {{ $project->solution }}
                                    </p>
                                </div>
                            @endif

                            @if ($project->result)
                                <div class="group p-8 rounded-[2.5rem] bg-emerald-50/50 dark:bg-emerald-900/10 border border-emerald-100 dark:border-emerald-800/20 transition-all duration-300 hover:shadow-2xl hover:shadow-emerald-100 dark:hover:shadow-none"
                                    data-reveal>
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="h-12 w-12 rounded-2xl bg-emerald-100 dark:bg-emerald-800/40 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shadow-inner group-hover:scale-110 transition-transform">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-2xl font-extrabold text-neutral-900 dark:text-white tracking-tight">
                                            Result</h3>
                                    </div>
                                    <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed text-lg">
                                        {{ $project->result }}
                                    </p>
                                </div>
                            @endif
                        </div>

                        @if ($project->link)
                            <div class="pt-8">
                                <a href="{{ $project->link }}" target="_blank"
                                    class="group inline-flex items-center justify-center w-full sm:w-auto px-10 py-5 text-lg font-black text-white transition-all duration-300 bg-indigo-600 border border-transparent rounded-2xl hover:bg-black hover:shadow-[0_20px_40px_-10px_rgba(79,70,229,0.3)] hover:-translate-y-1 active:scale-95">
                                    Kunjungi Live Project
                                    <svg class="w-6 h-6 ml-3 transition-transform group-hover:translate-x-1" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Right Column: Mockup Image -->
                    <div class="relative sticky top-32" data-reveal>
                        <!-- Decorative Backgrounds -->
                        <div class="absolute -top-12 -right-12 h-64 w-64 bg-indigo-500/10 blur-3xl rounded-full"></div>
                        <div class="absolute -bottom-12 -left-12 h-64 w-64 bg-violet-500/10 blur-3xl rounded-full"></div>

                        <div
                            class="relative rounded-[2.5rem] overflow-hidden border border-neutral-200 dark:border-neutral-800 shadow-[0_50px_100px_-20px_rgba(0,0,0,0.15)] bg-white dark:bg-neutral-800 transition-colors duration-500">
                            <!-- Browser Header -->
                            <div
                                class="h-10 bg-neutral-100 dark:bg-neutral-900 flex items-center justify-between px-6 border-b border-neutral-200 dark:border-neutral-800 transition-colors duration-500">
                                <div class="flex space-x-2">
                                    <div class="w-3.5 h-3.5 rounded-full bg-rose-400 shadow-inner"></div>
                                    <div class="w-3.5 h-3.5 rounded-full bg-amber-400 shadow-inner"></div>
                                    <div class="w-3.5 h-3.5 rounded-full bg-emerald-400 shadow-inner"></div>
                                </div>
                                <div
                                    class="px-4 py-1 rounded-full bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 text-[10px] text-neutral-400 font-mono tracking-tighter transition-colors duration-500">
                                    {{ Str::limit($project->link ?? 'syntaxtrust.com', 30) }}
                                </div>
                                <div class="w-12"></div>
                            </div>

                            <!-- Image -->
                            <div class="group overflow-hidden">
                                <img src="{{ $project->image ? \Illuminate\Support\Facades\Storage::url($project->image) : \Illuminate\Support\Facades\Storage::url('projects/default.png') }}"
                                    onerror="this.onerror=null;this.src='{{ \Illuminate\Support\Facades\Storage::url('projects/default.png') }}';"
                                    alt="{{ $project->title }}"
                                    class="w-full h-auto object-cover transition-transform duration-1000 group-hover:scale-110">

                                <!-- Overlay on hover -->
                                <div
                                    class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                                    <span
                                        class="px-6 py-3 bg-white/10 backdrop-blur-md rounded-2xl text-white font-bold border border-white/20">Full
                                        View</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Projects -->
        @if ($otherProjects->count() > 0)
            <section
                class="py-24 border-t border-neutral-100 dark:border-neutral-800 relative transition-colors duration-500"
                :class="theme === 'night' ? 'bg-slate-950/50' : 'bg-neutral-50/50'">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-2xl mx-auto mb-20" data-reveal>
                        <h2 class="text-4xl font-black text-neutral-900 dark:text-white tracking-tight">Karya Serupa</h2>
                        <div class="h-1.5 w-16 bg-indigo-600 mx-auto rounded-full mt-6 mb-6"></div>
                        <p class="text-xl text-neutral-500 dark:text-neutral-400">Jelajahi project lain yang kami kerjakan
                            dengan penuh dedikasi.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        @foreach ($otherProjects as $other)
                            <div class="group relative" data-reveal>
                                <a href="{{ route('project.show', $other->slug) }}"
                                    class="block p-4 rounded-[2.5rem] bg-white dark:bg-neutral-800 border border-neutral-100 dark:border-neutral-800 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                                    <div class="relative aspect-[4/3] rounded-[2rem] overflow-hidden mb-6">
                                        <img src="{{ $other->image ? \Illuminate\Support\Facades\Storage::url($other->image) : \Illuminate\Support\Facades\Storage::url('projects/default.png') }}"
                                            alt="{{ $other->title }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                            <span class="text-white font-bold flex items-center gap-2">Baca Case Study <svg
                                                    class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                                </svg></span>
                                        </div>
                                    </div>
                                    <div class="px-4 pb-4">
                                        <span
                                            class="text-xs font-black text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">{{ $other->category }}</span>
                                        <h3 class="text-xl font-black text-neutral-900 dark:text-white mt-2">
                                            {{ $other->title }}</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-20 text-center">
                        <a href="/#portofolio"
                            class="inline-flex items-center text-lg font-black text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 transition">
                            <svg class="w-6 h-6 mr-3 rotate-180" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                            Eksplorasi Semua Project
                        </a>
                    </div>
                </div>
            </section>
        @endif

        <!-- CTA Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative p-12 lg:p-20 rounded-[4rem] bg-indigo-600 overflow-hidden shadow-2xl shadow-indigo-200 dark:shadow-none"
                    data-reveal>
                    <div
                        class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-150">
                    </div>
                    <div class="relative z-10 grid lg:grid-cols-2 items-center gap-12">
                        <div class="text-white">
                            <h2 class="text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-6">Siap Membangun
                                Project Impian Anda?</h2>
                            <p class="text-xl text-indigo-100 leading-relaxed mb-10">Dapatkan konsultasi gratis dan
                                penawaran
                                terbaik untuk solusi digital Anda hari ini.</p>
                            <div class="flex flex-wrap gap-4">
                                <a href="/#jadwal"
                                    class="px-10 py-5 bg-white text-indigo-600 font-black rounded-2xl hover:bg-black hover:text-white transition-all transform hover:-translate-y-1 active:scale-95 shadow-xl">Konsultasi
                                    Sekarang</a>
                                <a href="https://wa.me/{{ preg_replace('/\D/', '', $__setting->whatsapp ?? '6285156553226') }}"
                                    class="px-10 py-5 bg-indigo-700/50 text-white font-black rounded-2xl border border-white/20 backdrop-blur-md hover:bg-white hover:text-indigo-600 transition-all transform hover:-translate-y-1 active:scale-95 shadow-xl">Chat
                                    WhatsApp</a>
                            </div>
                        </div>
                        <div class="hidden lg:block relative">
                            <div class="absolute inset-0 bg-white/20 blur-3xl rounded-full"></div>
                            <div class="relative text-9xl text-center">🚀</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
