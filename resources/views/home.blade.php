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
            background: radial-gradient(circle at 20% 20%, rgba(99, 102, 241, 0.35), transparent 45%),
                radial-gradient(circle at 80% 20%, rgba(129, 140, 248, 0.35), transparent 50%),
                linear-gradient(120deg, rgba(219, 234, 254, 0.9), rgba(221, 214, 254, 0.7), rgba(231, 229, 255, 0.9));
        }

        .hero-gradient.night {
            background: radial-gradient(circle at 25% 20%, rgba(129, 140, 248, 0.45), transparent 45%),
                radial-gradient(circle at 70% 80%, rgba(59, 130, 246, 0.4), transparent 55%),
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
            background: rgba(79, 70, 229, 0.35);
            box-shadow: 0 0 12px rgba(79, 70, 229, 0.45);
        }

        .hero-particle.night {
            background: rgba(165, 180, 252, 0.45);
            box-shadow: 0 0 18px rgba(129, 140, 248, 0.55);
        }

        @keyframes heroGradient {
            0% {
                transform: rotate(0deg) scale(1);
            }

            50% {
                transform: rotate(18deg) scale(1.08);
            }

            100% {
                transform: rotate(-12deg) scale(1);
            }
        }

        @keyframes heroParticle {
            0% {
                transform: translate3d(0, 0, 0) scale(1);
                opacity: 0.45;
            }

            50% {
                transform: translate3d(15px, -35px, 0) scale(1.45);
                opacity: 0.9;
            }

            100% {
                transform: translate3d(-5px, 5px, 0) scale(1);
                opacity: 0.55;
            }
        }

        .tech-fade-left {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.85) 0%, rgba(255, 255, 255, 0.65) 45%, rgba(255, 255, 255, 0) 100%);
        }

        .tech-fade-right {
            background: linear-gradient(270deg, rgba(255, 255, 255, 0.85) 0%, rgba(255, 255, 255, 0.65) 45%, rgba(255, 255, 255, 0) 100%);
        }

        body.theme-night .tech-fade-left {
            background: linear-gradient(90deg, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.6) 40%, rgba(15, 23, 42, 0) 100%);
        }

        body.theme-night .tech-fade-right {
            background: linear-gradient(270deg, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.6) 40%, rgba(15, 23, 42, 0) 100%);
        }

        .themed-panel {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .themed-panel-overlay {
            background: linear-gradient(180deg, rgba(248, 250, 252, 0.65) 0%, rgba(255, 255, 255, 0) 100%);
        }

        body.theme-night .themed-panel {
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.92) 0%, rgba(15, 23, 42, 0.86) 100%);
        }

        body.theme-night .themed-panel-overlay {
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.6) 0%, rgba(15, 23, 42, 0) 100%);
        }

        .typewriter-shell {
            background: rgba(255, 255, 255, 0.92);
            border-color: rgba(226, 232, 240, 0.7);
            color: #0f172a;
        }

        .typewriter-shell .typewriter-title {
            color: #0f172a;
        }

        .typewriter-shell .typewriter-tagline {
            color: #6366f1;
        }

        .typewriter-shell .typewriter-typed {
            color: #0f172a;
        }

        .typewriter-shell .typewriter-subtitle {
            color: #475569;
        }

        body.theme-night .typewriter-shell {
            background: rgba(15, 23, 42, 0.92);
            border-color: rgba(148, 163, 184, 0.35);
            color: #e2e8f0;
        }

        body.theme-night .typewriter-shell .typewriter-title {
            color: #e0e7ff;
        }

        body.theme-night .typewriter-shell .typewriter-tagline {
            color: #a5b4fc;
        }

        body.theme-night .typewriter-shell .typewriter-typed {
            color: #f8fafc;
        }

        body.theme-night .typewriter-shell .typewriter-subtitle {
            color: #cbd5f5;
        }

        .scheduler-shell {
            background: rgba(255, 255, 255, 0.9);
            border-color: rgba(226, 232, 240, 0.6);
        }

        .scheduler-shell .preview-title {
            color: #475569;
        }

        .scheduler-shell .preview-text {
            background: rgba(248, 250, 252, 0.9);
            color: #0f172a;
        }

        body.theme-night .scheduler-shell {
            background: rgba(15, 23, 42, 0.9);
            border-color: rgba(148, 163, 184, 0.35);
        }

        body.theme-night .scheduler-shell .preview-title {
            color: #a5b4fc;
        }

        body.theme-night .scheduler-shell .preview-text {
            background: rgba(30, 41, 59, 0.75);
            color: #e2e8f0;
        }

        .tilt-copy {
            color: #475569;
        }

        body.theme-night .tilt-copy {
            color: #cbd5f5;
        }

        .tilt-card {
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(226, 232, 240, 0.7);
            will-change: transform;
            transform-style: preserve-3d;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .tilt-card:hover {
            box-shadow: 0 35px 55px -35px rgba(79, 70, 229, 0.35);
        }

        body.theme-night .tilt-card {
            background: rgba(15, 23, 42, 0.9);
            border-color: rgba(148, 163, 184, 0.35);
            color: #e2e8f0;
        }

        body.theme-night .tilt-card:hover {
            box-shadow: 0 35px 60px -30px rgba(37, 99, 235, 0.35);
        }

        .tilt-card-badge {
            position: absolute;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem 0.75rem;
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            border-radius: 9999px;
            color: #fff;
            background-image: linear-gradient(120deg, #4f46e5 0%, #9333ea 50%, #ec4899 100%);
            backdrop-filter: blur(6px);
            box-shadow: 0 10px 25px -15px rgba(79, 70, 229, 0.75);
            animation: badgeBounce 2.4s ease-in-out infinite;
        }

        .tilt-card-badge::after {
            content: "";
            position: absolute;
            inset: -4px;
            border-radius: inherit;
            background: linear-gradient(120deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0));
            opacity: 0.4;
            z-index: -1;
        }

        @keyframes badgeBounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-4px);
            }
        }

        .testimonial-thumb {
            background: rgba(248, 250, 252, 0.82);
            border: 1px solid rgba(226, 232, 240, 0.6);
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
            backdrop-filter: blur(6px);
        }

        .testimonial-thumb:hover {
            border-color: rgba(148, 163, 184, 0.75);
            transform: translateY(-2px);
        }

        .testimonial-thumb-active {
            border-color: rgba(79, 70, 229, 0.7);
            background: rgba(79, 70, 229, 0.12);
            box-shadow: 0 18px 36px -28px rgba(79, 70, 229, 0.55);
        }

        body.theme-night .testimonial-thumb {
            background: rgba(15, 23, 42, 0.82);
            border-color: rgba(148, 163, 184, 0.3);
            color: #e2e8f0;
        }

        body.theme-night .testimonial-thumb:hover {
            border-color: rgba(148, 163, 184, 0.5);
        }

        body.theme-night .testimonial-thumb-active {
            background: rgba(79, 70, 229, 0.28);
            border-color: rgba(129, 140, 248, 0.65);
            box-shadow: 0 20px 42px -30px rgba(59, 130, 246, 0.6);
        }

        .testimonial-title,
        .testimonial-quote {
            transition: transform 0.45s ease, color 0.3s ease;
            will-change: transform;
        }

        .testimonial-title {
            color: #475569;
        }

        body.theme-night .testimonial-title {
            color: #cbd5f5;
        }

        .testimonial-quote {
            color: #1f2937;
        }

        body.theme-night .testimonial-quote {
            color: #e2e8f0;
        }

        .testimonial-meta {
            color: #64748b;
        }

        body.theme-night .testimonial-meta {
            color: #a5b4fc;
        }

        .micro-typewriter {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            min-height: 1.5rem;
        }

        .micro-typewriter .micro-caret {
            width: 0.2rem;
            height: 1rem;
            border-radius: 9999px;
            background: #6366f1;
            animation: microCaret 1s steps(2) infinite;
        }

        body.theme-night .micro-typewriter .micro-caret {
            background: #a5b4fc;
        }

        @keyframes microCaret {

            0%,
            49% {
                opacity: 1;
            }

            50%,
            100% {
                opacity: 0;
            }
        }

        .tech-card {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(226, 232, 240, 0.7);
            backdrop-filter: blur(6px);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .tech-card:hover {
            border-color: rgba(129, 140, 248, 0.45);
            box-shadow: 0 25px 50px -25px rgba(99, 102, 241, 0.4);
            transform: translateY(-2px);
        }

        body.theme-night .tech-card {
            background: rgba(15, 23, 42, 0.92);
            border-color: rgba(148, 163, 184, 0.35);
            box-shadow: inset 0 0 0 1px rgba(15, 23, 42, 0.6);
        }

        body.theme-night .tech-card:hover {
            border-color: rgba(99, 102, 241, 0.55);
            box-shadow: 0 30px 60px -35px rgba(79, 70, 229, 0.6);
        }

        .tech-card-title {
            color: #1f2937;
        }

        body.theme-night .tech-card-title {
            color: #e2e8f0;
        }

        .tech-card-meta {
            color: #64748b;
        }

        body.theme-night .tech-card-meta {
            color: #94a3b8;
        }

        .project-card {
            background: rgba(255, 255, 255, 0.92);
            border-radius: 1.25rem;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.7);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px -15px rgba(79, 70, 229, 0.25);
            border-color: rgba(99, 102, 241, 0.4);
        }

        .project-card-img-wrapper {
            position: relative;
            overflow: hidden;
            aspect-ratio: 16/10;
        }

        .project-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .project-card:hover .project-card-img {
            transform: scale(1.08);
        }

        body.theme-night .project-card {
            background: rgba(15, 23, 42, 0.9);
            border-color: rgba(148, 163, 184, 0.25);
        }

        body.theme-night .project-card:hover {
            box-shadow: 0 30px 60px -15px rgba(59, 130, 246, 0.3);
            border-color: rgba(129, 140, 248, 0.4);
        }

        .project-badge {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            background: rgba(79, 70, 229, 0.1);
            color: #4f46e5;
        }

        body.theme-night .project-badge {
            background: rgba(165, 180, 252, 0.15);
            color: #a5b4fc;
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            width: 0;
            height: 2px;
            background: currentColor;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }
    </style>

    <!-- Hero -->
    <section class="relative min-h-[90vh] flex items-center overflow-hidden transition-colors duration-700"
        x-data="heroTheme()" x-init="init()"
        :class="theme === 'night' ? 'bg-slate-950 text-white' : 'bg-white text-neutral-900'">

        <!-- Animated Background Decor -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="hero-gradient" :class="theme"></div>
            <template x-for="p in particles" :key="p.id">
                <span :class="['hero-particle', theme]" :style="particleStyle(p)"></span>
            </template>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Text Content -->
                <div data-reveal class="space-y-8">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-600/10 border border-indigo-600/20 text-indigo-600 text-xs font-bold uppercase tracking-widest shadow-sm">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-600"></span>
                        </span>
                        Satu-satunya Solusi Web Terpercaya
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold leading-[1.1] tracking-tight">
                        Wujudkan Website <br>
                        <span class="bg-linear-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">Impian
                            Anda</span>
                    </h1>

                    <p class="text-xl lg:text-2xl text-neutral-500 max-w-xl leading-relaxed"
                        :class="theme === 'night' ? 'text-neutral-400' : ''">
                        Dari tugas kuliah hingga sistem bisnis skala besar. Kami memberikan hasil koding berkualitas tinggi
                        dengan harga yang masuk akal.
                    </p>

                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="#jadwal"
                            class="px-8 py-4 rounded-2xl bg-indigo-600 text-white font-bold text-lg hover:bg-indigo-700 hover:shadow-[0_20px_40px_-10px_rgba(79,70,229,0.4)] transition-all duration-300 transform hover:-translate-y-1 active:scale-95">
                            Konsultasi Sekarang
                        </a>
                        <a href="#layanan"
                            class="px-8 py-4 rounded-2xl glass font-bold text-lg hover:bg-white transition-all duration-300 transform hover:-translate-y-1 active:scale-95 border border-neutral-200">
                            Lihat Layanan
                        </a>
                    </div>

                    <div class="flex items-center gap-6 pt-8 border-t border-neutral-100"
                        :class="theme === 'night' ? 'border-white/10' : ''">
                        <div>
                            <div class="text-2xl font-bold">24h</div>
                            <div class="text-xs text-neutral-400 uppercase tracking-widest">Respons Cepat</div>
                        </div>
                        <div class="h-8 w-px bg-neutral-200" :class="theme === 'night' ? 'bg-white/10' : ''"></div>
                        <div>
                            <div class="text-2xl font-bold">100%</div>
                            <div class="text-xs text-neutral-400 uppercase tracking-widest">Garansi Kepuasan</div>
                        </div>
                    </div>
                </div>

                <!-- Interactive Card -->
                <div class="relative" data-reveal>
                    <div class="absolute -inset-4 bg-indigo-600/20 blur-3xl rounded-full opacity-20"></div>
                    <div class="relative mx-auto max-w-md rounded-[2.5rem] p-8 typewriter-shell border border-white/50 shadow-2xl"
                        x-data="typewriterCard()" x-init="init()">

                        <!-- Floating Badges in Card -->
                        <div class="flex flex-wrap justify-center gap-2 mb-8">
                            <template x-for="(item, i) in items" :key="i">
                                <button type="button" @click="select(i)"
                                    class="px-4 py-2 rounded-xl text-xs font-bold transition-all duration-300 border backdrop-blur-md"
                                    :class="index === i ? 'bg-indigo-600 text-white shadow-lg border-indigo-600' :
                                        'bg-white/50 text-neutral-600 hover:bg-white/80 border-neutral-100'">
                                    <span x-text="item.label"></span>
                                </button>
                            </template>
                        </div>

                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="h-14 w-14 rounded-2xl bg-indigo-600 text-white shadow-xl shadow-indigo-100 flex items-center justify-center text-3xl"
                                    x-text="current?.emoji"></div>
                                <div>
                                    <h3 class="font-bold text-xl" x-text="current?.title"></h3>
                                    <div class="text-[10px] font-bold text-indigo-600 uppercase tracking-widest"
                                        x-text="current?.tagline"></div>
                                </div>
                            </div>

                            <div class="relative h-20 flex items-center">
                                <div class="font-mono text-xl sm:text-2xl font-bold text-neutral-800 leading-tight"
                                    :class="theme === 'night' ? 'text-white' : ''">
                                    <span x-text="displayText"></span>
                                    <span class="inline-block w-1.5 h-6 bg-indigo-600 ml-1 animate-pulse"></span>
                                </div>
                            </div>

                            <p class="text-sm text-neutral-500 italic" x-text="`“ ${current?.subtitle} ”`"></p>
                        </div>

                        <!-- Card Controls -->
                        <div class="mt-8 flex items-center justify-between">
                            <div class="flex gap-1.5">
                                <template x-for="(item, i) in items" :key="i">
                                    <div class="h-1.5 rounded-full transition-all duration-500"
                                        :class="index === i ? 'w-8 bg-indigo-600' : 'w-2 bg-neutral-200'"></div>
                                </template>
                            </div>
                            <div class="flex gap-2">
                                <button @click="prev()"
                                    class="h-10 w-10 rounded-xl bg-white border border-neutral-100 shadow-sm flex items-center justify-center hover:bg-neutral-50 transition-colors">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button @click="next()"
                                    class="h-10 w-10 rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-100 flex items-center justify-center hover:bg-indigo-700 transition-colors">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Theme Toggle (Simplified) -->
        <button type="button" @click="toggle()"
            class="fixed bottom-6 right-24 z-50 h-12 w-12 rounded-full glass border border-neutral-200 shadow-lg flex items-center justify-center hover:scale-110 transition-transform active:scale-95"
            aria-label="Toggle Theme">
            <span class="text-xl" x-text="theme==='night' ? '☀️' : '🌙'"></span>
        </button>
    </section>

    <!-- Angka Bicara (Statistics Counter) -->
    <section class="py-16 lg:py-24 relative overflow-hidden bg-white">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] bg-size-[24px_24px] opacity-30">
        </div>
        <div class="absolute top-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-neutral-200 to-transparent">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-10">
                <!-- Proyek Selesai -->
                <div class="group relative p-8 lg:p-10 rounded-[2.5rem] bg-white border border-neutral-100 text-center transition-all duration-500 hover:shadow-2xl hover:shadow-indigo-100 hover:-translate-y-2 box-border"
                    x-data="{
                        current: 0,
                        target: {{ $projectsCount }},
                        init() {
                            $nextTick(() => {
                                let interval = setInterval(() => {
                                    if (this.current < this.target) {
                                        this.current += Math.ceil((this.target - this.current) / 10 + 1);
                                        if (this.current > this.target) this.current = this.target;
                                    } else {
                                        this.current = this.target;
                                        clearInterval(interval);
                                    }
                                }, 60);
                            });
                        }
                    }" x-intersect.once="init()">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 mb-8 rounded-3xl bg-indigo-50 text-indigo-600 transition-colors duration-500 group-hover:bg-indigo-600 group-hover:text-white shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex items-center justify-center gap-1">
                        <span class="text-5xl font-extrabold text-neutral-900 tracking-tight" x-text="current">0</span>
                        <span class="text-3xl font-bold text-indigo-600">+</span>
                    </div>
                    <p class="text-[10px] font-bold text-neutral-400 mt-3 uppercase tracking-[0.2em]">Proyek Selesai</p>
                </div>

                <!-- Klien Puas -->
                <div class="group relative p-8 lg:p-10 rounded-[2.5rem] bg-white border border-neutral-100 text-center transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-100 hover:-translate-y-2"
                    x-data="{
                        current: 0,
                        target: {{ $happyClients }},
                        init() {
                            $nextTick(() => {
                                let interval = setInterval(() => {
                                    if (this.current < this.target) {
                                        this.current += Math.ceil((this.target - this.current) / 10 + 1);
                                        if (this.current > this.target) this.current = this.target;
                                    } else {
                                        this.current = this.target;
                                        clearInterval(interval);
                                    }
                                }, 60);
                            });
                        }
                    }" x-intersect.once="init()">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 mb-8 rounded-3xl bg-emerald-50 text-emerald-600 transition-colors duration-500 group-hover:bg-emerald-600 group-hover:text-white shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex items-center justify-center gap-1">
                        <span class="text-5xl font-extrabold text-neutral-900 tracking-tight" x-text="current">0</span>
                        <span class="text-3xl font-bold text-emerald-600">+</span>
                    </div>
                    <p class="text-[10px] font-bold text-neutral-400 mt-3 uppercase tracking-[0.2em]">Klien Puas</p>
                </div>

                <!-- Tahun Pengalaman -->
                <div class="group relative p-8 lg:p-10 rounded-[2.5rem] bg-white border border-neutral-100 text-center transition-all duration-500 hover:shadow-2xl hover:shadow-amber-100 hover:-translate-y-2"
                    x-data="{
                        current: 0,
                        target: {{ $yearsExperience }},
                        init() {
                            $nextTick(() => {
                                let interval = setInterval(() => {
                                    if (this.current < this.target) { this.current += 1; } else { clearInterval(interval); }
                                }, 200);
                            });
                        }
                    }" x-intersect.once="init()">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 mb-8 rounded-3xl bg-amber-50 text-amber-600 transition-colors duration-500 group-hover:bg-amber-600 group-hover:text-white shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex items-center justify-center gap-1">
                        <span class="text-5xl font-extrabold text-neutral-900 tracking-tight" x-text="current">0</span>
                        <span class="text-3xl font-bold text-amber-600">+</span>
                    </div>
                    <p class="text-[10px] font-bold text-neutral-400 mt-3 uppercase tracking-[0.2em]">Tahun Berdiri</p>
                </div>

                <!-- Kota Client -->
                <div class="group relative p-8 lg:p-10 rounded-[2.5rem] bg-white border border-neutral-100 text-center transition-all duration-500 hover:shadow-2xl hover:shadow-cyan-100 hover:-translate-y-2"
                    x-data="{
                        current: 0,
                        target: {{ $servedCities }},
                        init() {
                            $nextTick(() => {
                                let interval = setInterval(() => {
                                    if (this.current < this.target) { this.current += 1; } else { clearInterval(interval); }
                                }, 100);
                            });
                        }
                    }" x-intersect.once="init()">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 mb-8 rounded-3xl bg-cyan-50 text-cyan-600 transition-colors duration-500 group-hover:bg-cyan-600 group-hover:text-white shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex items-center justify-center gap-1">
                        <span class="text-5xl font-extrabold text-neutral-900 tracking-tight" x-text="current">0</span>
                        <span class="text-3xl font-bold text-cyan-600">+</span>
                    </div>
                    <p class="text-[10px] font-bold text-neutral-400 mt-3 uppercase tracking-[0.2em]">Kota Client</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Teknologi yang Digunakan -->
    <section class="bg-white" x-data="techCarousel()" x-init="init()" @mouseenter="pause()"
        @mouseleave="resume()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            <h2 class="text-2xl font-bold text-center" data-reveal>Teknologi yang Digunakan</h2>
            <p class="mt-2 text-neutral-600 text-center" data-reveal>Stack modern untuk hasil yang optimal.</p>
            <div class="relative mt-8">
                <div class="pointer-events-none absolute inset-y-0 left-0 w-16 tech-fade-left hidden sm:block"></div>
                <div class="pointer-events-none absolute inset-y-0 right-0 w-16 tech-fade-right hidden sm:block"></div>
                <button type="button"
                    class="hidden sm:flex absolute left-0 top-1/2 -translate-y-1/2 z-10 h-10 w-10 items-center justify-center rounded-full border border-neutral-200 bg-white shadow hover:bg-neutral-50"
                    @click="scroll(-1)" aria-label="Teknologi sebelumnya">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 6l-6 6 6 6" />
                    </svg>
                </button>
                <button type="button"
                    class="hidden sm:flex absolute right-0 top-1/2 -translate-y-1/2 z-10 h-10 w-10 items-center justify-center rounded-full border border-neutral-200 bg-white shadow hover:bg-neutral-50"
                    @click="scroll(1)" aria-label="Teknologi berikutnya">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 18l6-6-6-6" />
                    </svg>
                </button>
                <div class="overflow-hidden" x-ref="track">
                    <div class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-2 [-ms-overflow-style:none] [scrollbar-width:none]"
                        style="scrollbar-width:none;" x-ref="inner" @scroll.debounce.120ms="onScroll()">
                        @php
                            $techGroups = collect($technologies ?? [])->chunk(6); // 6 per slide (2 rows x 3 columns)
                        @endphp
                        @forelse($techGroups as $group)
                            <div class="tech-slide snap-start min-w-full sm:min-w-[540px] lg:min-w-[680px]" data-reveal>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                    @foreach ($group as $tech)
                                        @php
                                            $color = $tech->color ?: '#EEF2FF';
                                            $style = "--tech-color: {$color}";
                                            $bg = 'bg-white';
                                        @endphp
                                        <div class="tech-card rounded-xl border border-neutral-200 bg-white shadow-sm hover:shadow-md transition px-4 py-4 flex items-center gap-3"
                                            style="{{ $style }}">
                                            <div class="h-10 w-10 rounded-xl flex items-center justify-center text-white font-semibold shadow"
                                                style="background: var(--tech-color);">
                                                @if (
                                                    $tech->icon &&
                                                        (\Illuminate\Support\Str::startsWith($tech->icon, ['http://', 'https://', '/']) ||
                                                            \Illuminate\Support\Str::startsWith($tech->icon, ['uploads/'])))
                                                    <img src="{{ \Illuminate\Support\Str::startsWith($tech->icon, ['uploads/']) ? \Illuminate\Support\Facades\Storage::url($tech->icon) : $tech->icon }}"
                                                        alt="{{ $tech->name }}" class="h-8 w-8 object-contain">
                                                @elseif($tech->icon)
                                                    <i class="{{ $tech->icon }} text-lg"></i>
                                                @else
                                                    {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($tech->name, 0, 1)) }}
                                                @endif
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold tech-card-title">{{ $tech->name }}
                                                </div>
                                                @if ($tech->color)
                                                    <div class="text-xs tech-card-meta">{{ $tech->color }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    @for ($i = $group->count(); $i < 6; $i++)
                                        <div class="hidden sm:block"></div>
                                    @endfor
                                </div>
                            </div>
                        @empty
                            <div class="w-full text-center text-neutral-500 py-6">Belum ada teknologi yang ditampilkan.
                            </div>
                        @endforelse
                    </div>
                </div>
                <template x-if="slidesCount > 1">
                    <div class="mt-6 flex justify-center gap-2">
                        <template x-for="idx in pages()" :key="idx">
                            <button type="button" class="h-2.5 w-2.5 rounded-full transition"
                                :class="idx === index ? 'bg-indigo-600 w-6' : 'bg-neutral-300'" @click="go(idx)"
                                aria-label="Loncat ke slide" />
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- Layanan -->
    <section id="layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <h2 class="text-2xl font-bold">Layanan</h2>
        <p class="mt-2 text-neutral-600">Pilih layanan sesuai kebutuhan proyek Anda.</p>
        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services ?? [] as $idx => $svc)
                <div x-data="tiltCard()" @mousemove="move($event)" @mouseleave="reset()" class="relative"
                    style="perspective: 1200px;">
                    <div class="group relative rounded-xl tilt-card p-6" :style="cardStyle">
                        <div
                            class="absolute -inset-px rounded-xl bg-linear-to-br from-indigo-600/0 to-violet-600/0 opacity-0 group-hover:opacity-10 transition">
                        </div>
                        @if ($idx === 0)
                            <div class="tilt-card-badge -top-5 left-6">
                                <span class="inline-flex h-2 w-2 rounded-full bg-white animate-pulse"></span>
                                FAVORIT CLIENT
                            </div>
                        @endif
                        <div
                            class="relative h-10 w-10 rounded-lg bg-indigo-600/10 text-indigo-600 grid place-items-center group-hover:scale-110 transition p-2">
                            @if ($svc->icon)
                                <img src="{{ \Illuminate\Support\Str::startsWith($svc->icon, ['http://', 'https://', '/']) ? $svc->icon : \Illuminate\Support\Facades\Storage::url($svc->icon) }}"
                                    alt="{{ $svc->title }}" class="h-full w-full object-contain">
                            @else
                                <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 24 24'
                                    fill='none' stroke='currentColor'>
                                    <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2'
                                        d='M3 7h18M3 12h18M3 17h18' />
                                </svg>
                            @endif
                        </div>
                        <h3 class="mt-4 font-semibold">{{ $svc->title }}</h3>
                        <p class="mt-1 text-sm tilt-copy">{{ $svc->excerpt ?? Str::limit($svc->description, 120) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Portofolio -->
    <section id="portofolio" class="bg-white overflow-hidden" x-data="{ filter: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6" data-reveal>
                <div>
                    <h2 class="text-2xl font-bold">Portofolio Kami</h2>
                    <p class="mt-2 text-neutral-600">Beberapa project yang telah berhasil kami selesaikan.</p>
                </div>
                @php
                    $categories = collect($projects ?? [])
                        ->pluck('category')
                        ->filter()
                        ->unique();
                @endphp
                @if ($categories->count() > 0)
                    <div class="flex flex-wrap gap-2">
                        <button @click="filter = 'all'"
                            :class="filter === 'all' ? 'bg-indigo-600 text-white' :
                                'bg-neutral-100 text-neutral-600 hover:bg-neutral-200'"
                            class="px-4 py-1.5 rounded-full text-sm font-medium transition cursor-pointer">Semua</button>
                        @foreach ($categories as $cat)
                            <button @click="filter = @js($cat)"
                                :class="filter === @js($cat) ? 'bg-indigo-600 text-white' :
                                    'bg-neutral-100 text-neutral-600 hover:bg-neutral-200'"
                                class="px-4 py-1.5 rounded-full text-sm font-medium transition cursor-pointer">{{ $cat }}</button>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @forelse(($projects ?? []) as $prj)
                    <div class="project-card group" x-show="filter === 'all' || filter === @js($prj->category)"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100" data-reveal>
                        <div class="project-card-img-wrapper">
                            <img src="{{ $prj->image ? \Illuminate\Support\Facades\Storage::url($prj->image) : \Illuminate\Support\Facades\Storage::url('projects/default.png') }}"
                                onerror="this.onerror=null;this.src='{{ \Illuminate\Support\Facades\Storage::url('projects/default.png') }}';"
                                alt="{{ $prj->title }}" class="project-card-img">
                            <div
                                class="absolute inset-0 bg-linear-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4">
                                <a href="{{ route('project.show', $prj->slug) }}"
                                    class="bg-white text-neutral-900 px-5 py-2.5 rounded-xl text-xs font-extrabold uppercase tracking-wider hover:bg-neutral-100 transition-all shadow-xl hover:scale-105 active:scale-95">
                                    📜 Case Study
                                </a>
                                @if ($prj->link)
                                    <a href="{{ $prj->link }}" target="_blank"
                                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-indigo-500 transition-colors shadow-lg flex items-center gap-2">
                                        Live
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between gap-2">
                                <span class="project-badge">{{ $prj->category ?: 'General' }}</span>
                                @if ($prj->client_name)
                                    <span class="text-[10px] text-neutral-400 font-medium uppercase tracking-wider">Klien:
                                        {{ $prj->client_name }}</span>
                                @endif
                            </div>
                            <h3 class="mt-3 text-lg font-bold group-hover:text-indigo-600 transition-colors">
                                <a href="{{ route('project.show', $prj->slug) }}" class="block">
                                    {{ $prj->title }}
                                </a>
                            </h3>
                            <p class="mt-2 text-sm text-neutral-600 line-clamp-2 leading-relaxed">{{ $prj->description }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div
                            class="inline-flex h-20 w-20 rounded-full bg-neutral-50 items-center justify-center text-neutral-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <p class="mt-4 text-neutral-500">Belum ada project yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Kenapa Memilih SyntaxTrust -->
    <section class="py-16 lg:py-24 relative overflow-hidden bg-white">
        <!-- Background Decor -->
        <div class="absolute -top-24 -left-24 h-96 w-96 bg-indigo-600/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 h-96 w-96 bg-violet-600/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-16" data-reveal>
                <div class="max-w-2xl">
                    <h2 class="text-4xl font-extrabold text-neutral-900 tracking-tight leading-tight">Keunggulan Yang
                        <br><span class="text-indigo-600">Membedakan Kami</span>
                    </h2>
                    <p class="mt-6 text-lg text-neutral-500 micro-typewriter" x-data="microTypewriter([
                        'Fokus pada hasil, kecepatan, dan komunikasi yang jelas.',
                        'Selalu transparan soal scope, biaya, dan timeline.',
                        'Tim siap bantu dari perencanaan hingga pasca-deploy.'
                    ])"
                        x-init="init()">
                        <span x-text="display"></span>
                        <span class="micro-caret"></span>
                    </p>
                </div>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Card 1 -->
                <div class="group relative p-8 rounded-[2.5rem] bg-white border border-neutral-100 shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-indigo-100"
                    data-reveal>
                    <div
                        class="h-14 w-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-500 group-hover:rotate-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-3">Hasil Berkualitas</h3>
                    <p class="text-neutral-500 text-sm leading-relaxed">Koding rapi bersertifikasi, akses cepat, SEO dasar,
                        dan desain responsif yang memukau.</p>
                </div>

                <!-- Card 2 -->
                <div class="group relative p-8 rounded-[2.5rem] bg-white border border-neutral-100 shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-violet-100"
                    data-reveal>
                    <div
                        class="h-14 w-14 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center mb-6 group-hover:bg-violet-600 group-hover:text-white transition-all duration-500 group-hover:rotate-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-3">Transparan & Fleksibel</h3>
                    <p class="text-neutral-500 text-sm leading-relaxed">Estimasi biaya dan scope sangat jelas dari awal.
                        Harga bisa dinegosiasikan sesuai budget.</p>
                </div>

                <!-- Card 3 -->
                <div class="group relative p-8 rounded-[2.5rem] bg-white border border-neutral-100 shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-emerald-100"
                    data-reveal>
                    <div
                        class="h-14 w-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500 group-hover:rotate-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-3">Skalabilitas Tinggi</h3>
                    <p class="text-neutral-500 text-sm leading-relaxed">System yang kami bangun siap berkembang seiring
                        pertumbuhan bisnis Anda ke depannya.</p>
                </div>

                <!-- Card 4 -->
                <div class="group relative p-8 rounded-[2.5rem] bg-white border border-neutral-100 shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-amber-100"
                    data-reveal>
                    <div
                        class="h-14 w-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center mb-6 group-hover:bg-amber-600 group-hover:text-white transition-all duration-500 group-hover:rotate-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-3">Teknologi Terkini</h3>
                    <p class="text-neutral-500 text-sm leading-relaxed">Menggunakan Laravel 12, Tailwind v4, dan tech stack
                        modern lainnya untuk performa maksimal.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Paket Layanan (Pricing) -->
    <section id="pricing" class="py-16 lg:py-24 bg-neutral-50/50 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(#6366f1_1px,transparent_1px)] bg-size-[40px_40px] opacity-[0.02]">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20" data-reveal>
                <h2 class="text-4xl font-extrabold text-neutral-900 tracking-tight">Investasi Layanan</h2>
                <div class="h-1.5 w-24 bg-indigo-600 mx-auto rounded-full mt-4"></div>
                <p class="mt-6 text-lg text-neutral-600 max-w-2xl mx-auto">Kami menawarkan solusi fleksibel yang dapat
                    disesuaikan dengan skala proyek dan anggaran Anda.</p>
                <p class="text-[10px] font-bold text-neutral-400 mt-4 uppercase tracking-[0.2em]">* Harga transparan &
                    dapat dinegosiasikan</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 items-stretch pt-4">
                @foreach ($packages as $pkg)
                    <div class="relative group rounded-[2.5rem] border-2 {{ $pkg->is_highlighted ? 'border-indigo-600 bg-white shadow-2xl md:scale-105 z-10' : 'border-white bg-white/60 backdrop-blur-md shadow-xl' }} p-8 lg:p-10 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col"
                        data-reveal>
                        @if ($pkg->badge)
                            <div
                                class="absolute -top-4 left-1/2 -translate-x-1/2 bg-indigo-600 text-white text-[10px] font-bold uppercase tracking-[0.2em] px-6 py-2 rounded-full shadow-lg whitespace-nowrap">
                                {{ $pkg->badge }}
                            </div>
                        @endif

                        <div class="mb-10">
                            <h3 class="text-2xl font-extrabold text-neutral-900 tracking-tight">{{ $pkg->name }}</h3>
                            <p class="text-sm font-medium text-neutral-400 mt-2">{{ $pkg->tagline }}</p>

                            <div class="mt-8 flex items-baseline gap-2">
                                <span class="text-sm font-bold text-neutral-400 uppercase tracking-widest">Mulai</span>
                                <span
                                    class="text-4xl font-extrabold text-neutral-900 tracking-tight">{{ $pkg->price_text }}</span>
                            </div>
                        </div>

                        <ul class="space-y-5 mb-12 grow">
                            @foreach ($pkg->features as $feature)
                                <li
                                    class="flex items-start gap-4 text-sm {{ $feature['active'] ?? true ? 'text-neutral-600' : 'text-neutral-300 line-through' }}">
                                    <div
                                        class="h-5 w-5 rounded-full {{ $feature['active'] ?? true ? 'bg-indigo-50 text-indigo-600' : 'bg-neutral-50 text-neutral-300' }} flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">{{ $feature['text'] }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $contacts->where('type', 'whatsapp')->first()->value ?? '6285156553226') }}?text={{ urlencode($pkg->whatsapp_message ?? 'Halo SyntaxTrust, saya tertarik dengan Paket ' . $pkg->name) }}"
                            class="block text-center py-5 rounded-2xl font-extrabold text-sm tracking-widest uppercase transition-all {{ $pkg->is_highlighted ? 'bg-indigo-600 text-white hover:bg-black shadow-xl shadow-indigo-100' : 'bg-neutral-900 text-white hover:bg-indigo-600 shadow-md transform active:scale-95' }}">
                            {{ $pkg->is_highlighted ? 'Pesan Sekarang' : 'Konsultasi Gratis' }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Alur Kerja -->
    <section class="py-16 lg:py-24 bg-neutral-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Alur Kerja -->
            <section id="proses" class="py-16 lg:py-24 bg-white relative overflow-hidden rounded-[3rem]">
                <div
                    class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 h-96 w-96 bg-indigo-50 rounded-full blur-3xl opacity-50">
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="text-center mb-20" data-reveal>
                        <h2 class="text-4xl font-extrabold text-neutral-900 tracking-tight">Workflow Profesional Kami</h2>
                        <div class="h-1.5 w-24 bg-indigo-600 mx-auto rounded-full mt-4"></div>
                        <p class="mt-6 text-lg text-neutral-600 max-w-2xl mx-auto">Setiap baris kode yang kami tulis
                            melewati proses terstandarisasi untuk memastikan stabilitas dan keamanan.</p>
                    </div>

                    <div class="grid gap-8 md:grid-cols-4 mb-20">
                        @foreach ($process ?? [] as $idx => $ps)
                            <div class="group relative p-8 lg:p-10 rounded-[2.5rem] bg-neutral-50 border border-transparent transition-all duration-500 hover:bg-white hover:border-indigo-100 hover:shadow-2xl"
                                data-reveal>
                                <div
                                    class="text-[5rem] font-black text-white group-hover:text-indigo-600/5 transition-colors duration-500 absolute top-4 right-8 select-none">
                                    {{ $idx + 1 }}
                                </div>

                                <div
                                    class="h-16 w-16 rounded-2xl bg-white shadow-lg flex items-center justify-center text-indigo-600 mb-8 transform transition-transform group-hover:scale-110 group-hover:-rotate-6">
                                    @if (isset($ps->icon))
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($ps->icon) }}"
                                            class="h-8 w-8 object-contain">
                                    @else
                                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    @endif
                                </div>

                                <h3
                                    class="text-xl font-extrabold text-neutral-900 mb-4 group-hover:text-indigo-600 transition-colors uppercase tracking-tight">
                                    {{ $ps->title }}</h3>
                                <p class="text-neutral-500 text-sm leading-relaxed">{{ $ps->description }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Interactive Timeline -->
                    <div class="relative bg-white rounded-[2.5rem] p-8 lg:p-16 shadow-2xl overflow-hidden"
                        x-data="{
                            step: 1,
                            steps: [
                                @foreach ($timeline ?? [] as $t){ k:'{{ addslashes($t->title) }}', d:'{{ addslashes($t->description) }}' }@if (!$loop->last),@endif @endforeach
                            ]
                        }" data-reveal>

                        <div
                            class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 h-64 w-64 bg-indigo-600/5 rounded-full blur-3xl">
                        </div>

                        <div class="relative z-10">
                            <div class="text-center mb-12">
                                <span
                                    class="text-xs font-bold text-indigo-600 uppercase tracking-widest border border-indigo-100 px-3 py-1 rounded-full">Interactive
                                    Journey</span>
                                <h3 class="text-2xl font-bold mt-4">Timeline Transparan Kami</h3>
                            </div>

                            <!-- Timeline Progress Bar -->
                            <div class="relative pt-12">
                                <div class="absolute left-0 right-0 top-[1.85rem] h-1.5 bg-neutral-100 rounded-full"></div>
                                <div class="absolute left-0 top-[1.85rem] h-1.5 bg-indigo-600 rounded-full transition-all duration-700 shadow-[0_0_15px_rgba(79,70,229,0.5)]"
                                    :style="`width: ${(step-1)/(steps.length-1)*100}%`"></div>

                                <div class="relative z-10 grid grid-cols-5 gap-4">
                                    <template x-for="(s, idx) in steps" :key="idx">
                                        <div class="flex flex-col items-center">
                                            <button @click="step=idx+1"
                                                class="relative h-12 w-12 rounded-2xl flex items-center justify-center font-bold text-lg transition-all duration-500 transform"
                                                :class="idx + 1 <= step ?
                                                    'bg-indigo-600 text-white scale-110 shadow-lg shadow-indigo-100' :
                                                    'bg-white text-neutral-400 border-2 border-neutral-100 hover:border-indigo-200 hover:text-indigo-600'">
                                                <span x-text="idx+1"></span>
                                                <!-- Pulse Effect for Active Step -->
                                                <template x-if="idx + 1 === step">
                                                    <span
                                                        class="absolute inset-0 rounded-2xl bg-indigo-600 animate-ping opacity-20"></span>
                                                </template>
                                            </button>
                                            <div class="mt-6 text-center">
                                                <div class="text-sm font-bold uppercase tracking-tight transition-colors duration-300"
                                                    :class="idx + 1 === step ? 'text-indigo-600' : 'text-neutral-500'"
                                                    x-text="s.k"></div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Step Content -->
                            <div
                                class="mt-16 p-8 rounded-3xl bg-neutral-50 border border-neutral-100 min-h-[160px] flex items-center justify-center text-center">
                                <template x-for="(s, idx) in steps" :key="idx">
                                    <div x-show="step === idx + 1"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4"
                                        x-transition:enter-end="opacity-100 translate-y-0" class="max-w-2xl">
                                        <h4 class="text-2xl font-bold text-neutral-900 mb-4" x-text="s.k"></h4>
                                        <p class="text-neutral-600 leading-relaxed text-lg" x-text="s.d"></p>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimoni -->
            <section class="py-16 lg:py-24 bg-white overflow-hidden" x-data="testimonialCarousel(@js($testimonialItems ?? []))" x-init="init()">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16" data-reveal>
                        <h2 class="text-4xl font-extrabold text-neutral-900 tracking-tight">Apa Kata Klien Kami</h2>
                        <div class="h-1.5 w-24 bg-indigo-600 mx-auto rounded-full mt-4"></div>
                        <p class="mt-6 text-lg text-neutral-600 max-w-2xl mx-auto">Kepercayaan Anda adalah prioritas kami.
                            Inilah pengalaman mereka bekerja sama dengan SyntaxTrust.</p>
                    </div>

                    <div class="relative" x-show="items.length">
                        <!-- Main Carousel -->
                        <div class="relative bg-neutral-900 rounded-[2.5rem] p-10 lg:p-20 text-white overflow-hidden shadow-2xl shadow-indigo-200/50"
                            data-reveal>
                            <!-- Quote Decoration -->
                            <div class="absolute top-10 left-10 text-indigo-500 opacity-20">
                                <svg class="h-24 w-24" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C20.1216 16 21.017 16.8954 21.017 18V21C21.017 22.1046 20.1216 23 19.017 23H16.017C14.9124 23 14.017 22.1046 14.017 21ZM14.017 21C14.017 19.8954 13.1216 19 12.017 19H9.017C7.9124 19 7.017 19.8954 7.017 21V23H12.017C13.1216 23 14.017 22.1046 14.017 21ZM5.017 21V23H0.017V21C0.017 19.8954 0.91244 19 2.017 19H5.017C6.1216 19 7.017 19.8954 7.017 21ZM10.017 12V3H21.017V12H10.017ZM0.017 12V3H7.017V12H0.017Z"
                                        opacity="0.1" />
                                </svg>
                            </div>

                            <div class="relative z-10">
                                <template x-for="(item, idx) in items" :key="idx">
                                    <article x-show="index === idx"
                                        x-transition:enter="transition ease-out duration-500 transform"
                                        x-transition:enter-start="opacity-0 translate-x-8"
                                        x-transition:enter-end="opacity-100 translate-x-0"
                                        class="flex flex-col items-center text-center">
                                        <div class="mb-8">
                                            <div class="flex items-center gap-1 mb-4 justify-center">
                                                <template x-for="r in 5" :key="r">
                                                    <svg class="h-6 w-6"
                                                        :class="r <= item.rating ? 'text-amber-400' : 'text-neutral-700'"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                    </svg>
                                                </template>
                                            </div>
                                            <blockquote
                                                class="text-2xl lg:text-4xl font-medium leading-tight mb-10 italic">
                                                &ldquo;<span x-text="item.text"></span>&rdquo;
                                            </blockquote>
                                        </div>

                                        <div class="flex flex-col items-center">
                                            <template x-if="item.avatar">
                                                <img :src="item.avatar"
                                                    class="h-20 w-20 rounded-full border-4 border-indigo-500/30 object-cover mb-4"
                                                    alt="avatar">
                                            </template>
                                            <template x-if="!item.avatar">
                                                <div class="h-20 w-20 rounded-full bg-indigo-600 flex items-center justify-center text-2xl font-bold mb-4 shadow-xl"
                                                    x-text="(item.name||'?').slice(0,1)"></div>
                                            </template>
                                            <div class="text-xl font-bold" x-text="item.name"></div>
                                            <div class="text-indigo-400 text-sm font-medium uppercase tracking-widest mt-1"
                                                x-text="item.role || 'Klien Puas' "></div>
                                        </div>
                                    </article>
                                </template>
                            </div>

                            <!-- Carousel Controls -->
                            <div class="absolute inset-y-0 left-4 lg:left-8 flex items-center">
                                <button @click="prev()"
                                    class="h-14 w-14 rounded-2xl bg-white/10 hover:bg-white/20 transition-all flex items-center justify-center backdrop-blur-md border border-white/10 group">
                                    <svg class="h-6 w-6 transform group-hover:-translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div class="absolute inset-y-0 right-4 lg:right-8 flex items-center">
                                <button @click="next()"
                                    class="h-14 w-14 rounded-2xl bg-indigo-600 hover:bg-indigo-700 transition-all flex items-center justify-center shadow-xl shadow-indigo-600/30 group">
                                    <svg class="h-6 w-6 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Thumbnail Navigation -->
                        <div class="mt-12 flex justify-center gap-4 flex-wrap" data-reveal>
                            <template x-for="(item, idx) in items" :key="`thumb-${idx}`">
                                <button @click="go(idx)"
                                    class="group relative flex flex-col items-center transition-all duration-300 transform"
                                    :class="index === idx ? 'scale-110' : 'opacity-40 hover:opacity-100'">
                                    <div class="h-16 w-16 rounded-2xl overflow-hidden border-2 transition-all duration-300"
                                        :class="index === idx ? 'border-indigo-600 ring-4 ring-indigo-50 shadow-lg' :
                                            'border-neutral-200'">
                                        <template x-if="item.avatar">
                                            <img :src="item.avatar" class="h-full w-full object-cover"
                                                alt="thumb">
                                        </template>
                                        <template x-if="!item.avatar">
                                            <div class="h-full w-full bg-neutral-100 flex items-center justify-center font-bold text-neutral-400"
                                                x-text="(item.name||'?').slice(0,1)"></div>
                                        </template>
                                    </div>
                                </button>
                            </template>
                        </div>
                    </div>

                    <template x-if="!items.length">
                        <div
                            class="text-center py-20 bg-neutral-50 rounded-[3rem] border-2 border-dashed border-neutral-200">
                            <p class="text-neutral-500 font-medium">Belum ada testimoni yang ditampilkan.</p>
                        </div>
                    </template>
                </div>
            </section>

            <!-- Jadwalkan Pertemuan -->
            <section id="jadwal" class="bg-white">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{
                    name: '',
                    when: '',
                    method: 'meet',
                    topic: '',
                    link: '',
                    toast: false,
                    toastMsg: 'Terkirim. Lanjutkan di WhatsApp.',
                    tz: Intl.DateTimeFormat().resolvedOptions().timeZone,
                    remember: false,
                    submitting: false,
                    touched: { name: false, when: false, topic: false, link: false },
                    get wa() { return (window.WHATSAPP_NUMBER || '6285156553226') },
                    get whenText() { const d = new Date(this.when); return isNaN(d) ? this.when : d.toLocaleString('id-ID'); },
                    get validLink() { if (this.method !== 'meet') return true; if (!this.link) return true; return /^https?:\/\/meet\.google\.com\/[a-z0-9\-]+/i.test(this.link); },
                    get validWhen() { const d = new Date(this.when); if (isNaN(d)) return false; return d.getTime() >= (Date.now() - 5 * 60 * 1000); },
                    get nameValid() { return this.name.trim().length >= 3; },
                    get topicValid() { return this.topic.trim().length >= 5; },
                    get methodValid() { return !!this.method; },
                    get formValid() { return this.nameValid && this.validWhen && this.topicValid && this.methodValid && this.validLink; },
                    get stepsState() {
                        return [
                            { label: 'Data Diri', done: this.nameValid },
                            { label: 'Jadwal', done: this.validWhen },
                            { label: 'Topik', done: this.topicValid },
                            { label: 'Metode', done: this.methodValid }
                        ];
                    },
                    get progressPercent() { const steps = this.stepsState; const total = steps.length || 1; const done = steps.filter(s => s.done).length; return Math.round(done / total * 100); },
                    fmt(dt) { const p = n => String(n).padStart(2, '0'); return `${dt.getFullYear()}-${p(dt.getMonth()+1)}-${p(dt.getDate())}T${p(dt.getHours())}:${p(dt.getMinutes())}`; },
                    preset(t) {
                        const d = new Date();
                        if (t === 'today-19') { d.setHours(19, 0, 0, 0); }
                        if (t === 'tom-10') {
                            d.setDate(d.getDate() + 1);
                            d.setHours(10, 0, 0, 0);
                        }
                        if (t === 'tom-19') {
                            d.setDate(d.getDate() + 1);
                            d.setHours(19, 0, 0, 0);
                        }
                        if (t === 'day2-10') {
                            d.setDate(d.getDate() + 2);
                            d.setHours(10, 0, 0, 0);
                        }
                        this.when = this.fmt(d);
                    },
                    get msg() {
                        let m = `Halo SyntaxTrust,%0A` +
                            `Saya ${this.name||'-'} ingin menjadwalkan pertemuan.%0A` +
                            `Waktu: ${this.whenText||'-'}%0A` +
                            `Metode: ${this.method==='meet'?'Google Meet':'WhatsApp'}%0A` +
                            `Topik: ${this.topic||'-'}`;
                        if (this.method === 'meet' && this.link) { m += `%0ALink: ${this.link}` }
                        return m;
                    },
                    submit() {
                        this.touched.name = true;
                        this.touched.when = true;
                        this.touched.topic = true;
                        if (this.method === 'meet' && this.link) { this.touched.link = true; }
                        if (!this.formValid || this.submitting) return;
                        this.submitting = true;
                        window.open(`https://wa.me/${this.wa}?text=${this.msg}`, '_blank');
                        this.toast = true;
                        setTimeout(() => this.toast = false, 2500);
                        setTimeout(() => { this.submitting = false; }, 1200);
                    },
                    save() {
                        if (!this.remember) {
                            localStorage.removeItem('schedulerDraft');
                            localStorage.removeItem('schedulerRemember');
                            return;
                        }
                        localStorage.setItem('schedulerRemember', '1');
                        localStorage.setItem('schedulerDraft', JSON.stringify({ name: this.name, when: this.when, method: this.method, topic: this.topic, link: this.link }));
                    },
                    load() {
                        try {
                            this.remember = localStorage.getItem('schedulerRemember') === '1';
                            if (!this.remember) return;
                            const d = JSON.parse(localStorage.getItem('schedulerDraft') || '{}');
                            this.name = d.name || '';
                            this.when = d.when || '';
                            this.method = d.method || 'meet';
                            this.topic = d.topic || '';
                            this.link = d.link || '';
                        } catch (e) {}
                    },
                    resetAll() {
                        this.name = '';
                        this.when = '';
                        this.method = 'meet';
                        this.topic = '';
                        this.link = '';
                        this.remember = false;
                        this.touched = { name: false, when: false, topic: false, link: false };
                        localStorage.removeItem('schedulerDraft');
                        localStorage.removeItem('schedulerRemember');
                    }
                }"
                    x-init="load();
                    $watch('name', () => save());
                    $watch('when', () => save());
                    $watch('method', () => save());
                    $watch('topic', () => save());
                    $watch('link', () => save());
                    $watch('remember', () => save());">
                    <!-- Jadwalkan Pertemuan -->
                    <section id="jadwal" class="py-16 lg:py-24 bg-neutral-50 relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-[radial-gradient(#6366f1_1px,transparent_1px)] bg-size-[40px_40px] opacity-[0.03]">
                        </div>

                        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" x-data="{
                            name: '',
                            when: '',
                            method: 'meet',
                            topic: '',
                            link: '',
                            toast: false,
                            toastMsg: 'Terkirim. Lanjutkan di WhatsApp.',
                            tz: Intl.DateTimeFormat().resolvedOptions().timeZone,
                            remember: false,
                            submitting: false,
                            touched: { name: false, when: false, topic: false, link: false },
                            get wa() { return (window.WHATSAPP_NUMBER || '6285156553226') },
                            get whenText() { const d = new Date(this.when); return isNaN(d) ? this.when : d.toLocaleString('id-ID', { dateStyle: 'long', timeStyle: 'short' }); },
                            get validLink() { if (this.method !== 'meet') return true; if (!this.link) return true; return /^https?:\/\/meet\.google\.com\/[a-z0-9\-]+/i.test(this.link); },
                            get validWhen() { const d = new Date(this.when); if (isNaN(d)) return false; return d.getTime() >= (Date.now() - 5 * 60 * 1000); },
                            get nameValid() { return this.name.trim().length >= 3; },
                            get topicValid() { return this.topic.trim().length >= 5; },
                            get methodValid() { return !!this.method; },
                            get formValid() { return this.nameValid && this.validWhen && this.topicValid && this.methodValid && this.validLink; },
                            get progressPercent() {
                                let score = 0;
                                if (this.nameValid) score += 25;
                                if (this.validWhen) score += 25;
                                if (this.topicValid) score += 25;
                                if (this.methodValid) score += 25;
                                return score;
                            },
                            fmt(dt) { const p = n => String(n).padStart(2, '0'); return `${dt.getFullYear()}-${p(dt.getMonth()+1)}-${p(dt.getDate())}T${p(dt.getHours())}:${p(dt.getMinutes())}`; },
                            preset(t) {
                                const d = new Date();
                                if (t === 'today-19') { d.setHours(19, 0, 0, 0); }
                                if (t === 'tom-10') {
                                    d.setDate(d.getDate() + 1);
                                    d.setHours(10, 0, 0, 0);
                                }
                                if (t === 'tom-19') {
                                    d.setDate(d.getDate() + 1);
                                    d.setHours(19, 0, 0, 0);
                                }
                                if (t === 'day2-10') {
                                    d.setDate(d.getDate() + 2);
                                    d.setHours(10, 0, 0, 0);
                                }
                                this.when = this.fmt(d);
                            },
                            get msg() {
                                let m = `Halo SyntaxTrust,%0A` +
                                    `Saya *${this.name||'-'}* ingin menjadwalkan pertemuan.%0A%0A` +
                                    `📅 *Waktu:* ${this.whenText||'-'}%0A` +
                                    `📍 *Metode:* ${this.method==='meet'?'Google Meet':'WhatsApp'}%0A` +
                                    `💬 *Topik:* ${this.topic||'-'}`;
                                if (this.method === 'meet' && this.link) { m += `%0A🔗 *Link:* ${this.link}` }
                                return m;
                            },
                            submit() {
                                this.touched.name = true;
                                this.touched.when = true;
                                this.touched.topic = true;
                                if (this.method === 'meet' && this.link) { this.touched.link = true; }
                                if (!this.formValid || this.submitting) return;
                                this.submitting = true;
                                window.open(`https://wa.me/${this.wa}?text=${this.msg}`, '_blank');
                                this.toast = true;
                                setTimeout(() => this.toast = false, 3500);
                                setTimeout(() => { this.submitting = false; }, 1200);
                            },
                            save() {
                                if (!this.remember) {
                                    localStorage.removeItem('schedulerDraft');
                                    localStorage.removeItem('schedulerRemember');
                                    return;
                                }
                                localStorage.setItem('schedulerRemember', '1');
                                localStorage.setItem('schedulerDraft', JSON.stringify({ name: this.name, when: this.when, method: this.method, topic: this.topic, link: this.link }));
                            },
                            load() {
                                try {
                                    this.remember = localStorage.getItem('schedulerRemember') === '1';
                                    if (!this.remember) return;
                                    const d = JSON.parse(localStorage.getItem('schedulerDraft') || '{}');
                                    this.name = d.name || '';
                                    this.when = d.when || '';
                                    this.method = d.method || 'meet';
                                    this.topic = d.topic || '';
                                    this.link = d.link || '';
                                } catch (e) {}
                            },
                            resetAll() {
                                this.name = '';
                                this.when = '';
                                this.method = 'meet';
                                this.topic = '';
                                this.link = '';
                                this.remember = false;
                                this.touched = { name: false, when: false, topic: false, link: false };
                                localStorage.removeItem('schedulerDraft');
                                localStorage.removeItem('schedulerRemember');
                            }
                        }"
                            x-init="load();
                            $watch(['name', 'when', 'method', 'topic', 'link', 'remember'], () => save())">

                            <div class="text-center mb-16" data-reveal>
                                <h2 class="text-4xl font-extrabold text-neutral-900 tracking-tight">Mulai Projek Anda Hari
                                    Ini</h2>
                                <div class="h-1.5 w-24 bg-indigo-600 mx-auto rounded-full mt-4"></div>
                                <p class="mt-6 text-lg text-neutral-600 max-w-2xl mx-auto">Tentukan jadwal konsultasi Anda
                                    sendiri secara instan. Kami akan menghubungi Anda kembali via WhatsApp.</p>
                            </div>

                            <div class="grid lg:grid-cols-5 gap-12">
                                <!-- Main Form Card -->
                                <div class="lg:col-span-3 bg-white rounded-[2.5rem] border border-neutral-100 shadow-2xl p-8 sm:p-12 relative overflow-hidden"
                                    data-reveal>
                                    <!-- Progress Bar Overlay -->
                                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-neutral-100 overflow-hidden">
                                        <div class="h-full bg-indigo-600 transition-all duration-700 shadow-[0_0_10px_rgba(79,70,229,0.5)]"
                                            :style="`width: ${progressPercent}%`"></div>
                                    </div>

                                    <form @submit.prevent="submit()" class="space-y-8">
                                        <div class="grid sm:grid-cols-2 gap-6">
                                            <!-- Name Field -->
                                            <div class="space-y-2">
                                                <label
                                                    class="text-sm font-bold text-neutral-700 uppercase tracking-widest ml-1">Nama
                                                    Lengkap</label>
                                                <div class="relative">
                                                    <input x-model="name" @blur="touched.name=true" type="text"
                                                        placeholder="Masukkan nama Anda"
                                                        class="w-full h-14 rounded-2xl border-2 px-5 transition-all outline-hidden"
                                                        :class="(touched.name && !nameValid) ?
                                                        'border-red-100 bg-red-50 focus:border-red-300' :
                                                        'border-neutral-50 bg-neutral-50 focus:border-indigo-600 focus:bg-white'">
                                                    <template x-if="nameValid">
                                                        <div
                                                            class="absolute right-4 top-1/2 -translate-y-1/2 text-emerald-500">
                                                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    </template>
                                                </div>
                                                <p x-show="touched.name && !nameValid"
                                                    class="text-xs text-red-500 ml-1 font-medium">Nama minimal 3 karakter.
                                                </p>
                                            </div>

                                            <!-- Date & Time Field -->
                                            <div class="space-y-2">
                                                <label
                                                    class="text-sm font-bold text-neutral-700 uppercase tracking-widest ml-1">Pilih
                                                    Jadwal</label>
                                                <div class="relative">
                                                    <input x-model="when" @blur="touched.when=true" type="datetime-local"
                                                        class="w-full h-14 rounded-2xl border-2 px-5 transition-all outline-hidden appearance-none"
                                                        :class="(touched.when && !validWhen) ?
                                                        'border-red-100 bg-red-50 focus:border-red-300' :
                                                        'border-neutral-50 bg-neutral-50 focus:border-indigo-600 focus:bg-white'">
                                                </div>
                                                <div class="flex flex-wrap gap-2 mt-3">
                                                    <button type="button" @click="preset('tom-10')"
                                                        class="px-3 py-1.5 rounded-xl border border-neutral-200 text-xs font-bold hover:bg-neutral-50 transition-colors">Besok
                                                        10:00</button>
                                                    <button type="button" @click="preset('tom-19')"
                                                        class="px-3 py-1.5 rounded-xl border border-neutral-200 text-xs font-bold hover:bg-neutral-50 transition-colors">Besok
                                                        19:00</button>
                                                </div>
                                                <p x-show="touched.when && !validWhen"
                                                    class="text-xs text-red-500 ml-1 font-medium italic">Waktu tidak valid
                                                    atau sudah lewat.</p>
                                            </div>
                                        </div>

                                        <!-- Method Selector -->
                                        <div class="space-y-3">
                                            <label
                                                class="text-sm font-bold text-neutral-700 uppercase tracking-widest ml-1">Metode
                                                Pertemuan</label>
                                            <div class="grid grid-cols-2 gap-4">
                                                <button type="button" @click="method='meet'"
                                                    class="p-4 rounded-2xl border-2 flex flex-col items-center gap-2 transition-all"
                                                    :class="method === 'meet' ?
                                                        'border-indigo-600 bg-indigo-50/50 text-indigo-700' :
                                                        'border-neutral-50 bg-neutral-50 text-neutral-500 hover:border-neutral-100'">
                                                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 00-2 2z" />
                                                    </svg>
                                                    <span class="font-bold text-sm">Google Meet</span>
                                                </button>
                                                <button type="button" @click="method='wa'"
                                                    class="p-4 rounded-2xl border-2 flex flex-col items-center gap-2 transition-all"
                                                    :class="method === 'wa' ?
                                                        'border-indigo-600 bg-indigo-50/50 text-indigo-700' :
                                                        'border-neutral-50 bg-neutral-50 text-neutral-500 hover:border-neutral-100'">
                                                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                    </svg>
                                                    <span class="font-bold text-sm">WhatsApp</span>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Topic Field -->
                                        <div class="space-y-2">
                                            <label
                                                class="text-sm font-bold text-neutral-700 uppercase tracking-widest ml-1">Topik
                                                Utama</label>
                                            <input x-model="topic" @blur="touched.topic=true" type="text"
                                                placeholder="Apa yang ingin Anda diskusikan?"
                                                class="w-full h-14 rounded-2xl border-2 px-5 border-neutral-50 bg-neutral-50 focus:border-indigo-600 focus:bg-white transition-all outline-hidden"
                                                :class="(touched.topic && !topicValid) ? 'border-red-100 bg-red-50' : ''">
                                            <p x-show="touched.topic && !topicValid"
                                                class="text-xs text-red-500 ml-1 font-medium">Topik minimal 5 karakter.</p>
                                        </div>

                                        <!-- Footer Actions -->
                                        <div
                                            class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-6 border-t border-neutral-100">
                                            <label class="inline-flex items-center gap-3 cursor-pointer group">
                                                <input type="checkbox" x-model="remember"
                                                    class="w-5 h-5 rounded-lg border-2 border-neutral-200 text-indigo-600 focus:ring-indigo-500 transition-all">
                                                <span
                                                    class="text-sm font-medium text-neutral-500 group-hover:text-neutral-700 transition-colors">Ingat
                                                    isian saya</span>
                                            </label>

                                            <button type="submit" :disabled="!formValid || submitting"
                                                class="w-full sm:w-auto px-10 py-5 rounded-2xl bg-indigo-600 text-white font-extrabold text-lg shadow-xl shadow-indigo-100 hover:bg-indigo-700 hover:shadow-indigo-200 transition-all duration-300 transform active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-3">
                                                <span x-show="!submitting">Kirim ke WhatsApp</span>
                                                <span x-show="submitting" class="flex items-center gap-2">
                                                    <svg class="animate-spin h-5 w-5 text-white" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
                                                    </svg>
                                                    Memproses...
                                                </span>
                                                <svg x-show="!submitting" class="h-6 w-6" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Preview Sidebar -->
                                <div class="lg:col-span-2 space-y-8">
                                    <!-- Preview Card -->
                                    <div class="bg-indigo-900 rounded-[2.5rem] p-8 text-white relative overflow-hidden shadow-2xl"
                                        data-reveal>
                                        <div class="absolute -top-10 -right-10 h-32 w-32 bg-white/5 rounded-full blur-2xl">
                                        </div>
                                        <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                                            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                            Pratinjau Pesan
                                        </h3>
                                        <div class="bg-indigo-950/50 rounded-2xl p-6 font-mono text-sm leading-relaxed border border-white/10 wrap-break-word whitespace-pre-wrap min-h-[120px]"
                                            x-text="decodeURIComponent(msg.replaceAll('%0A','\n').replaceAll('*',''))">
                                        </div>
                                        <p class="mt-6 text-xs text-indigo-300/80 italic flex items-start gap-2">
                                            <svg class="h-4 w-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Pesan ini akan dikirimkan langsung ke nomor admin kami melalui aplikasi
                                            WhatsApp.
                                        </p>
                                    </div>

                                    <!-- Info Card -->
                                    <div class="bg-white rounded-[2.5rem] border border-neutral-100 p-8 shadow-xl"
                                        data-reveal>
                                        <h4 class="font-bold text-neutral-900 mb-4">Kenapa Konsultasi?</h4>
                                        <ul class="space-y-4">
                                            <li class="flex gap-3 items-start">
                                                <div
                                                    class="h-6 w-6 rounded-full bg-indigo-50 flex items-center justify-center shrink-0">
                                                    <svg class="h-4 w-4 text-indigo-600" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <p class="text-sm text-neutral-500 font-medium">Mendapatkan estimasi harga
                                                    transparan.</p>
                                            </li>
                                            <li class="flex gap-3 items-start">
                                                <div
                                                    class="h-6 w-6 rounded-full bg-indigo-50 flex items-center justify-center shrink-0">
                                                    <svg class="h-4 w-4 text-indigo-600" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <p class="text-sm text-neutral-500 font-medium">Bebas memilih waktu yang
                                                    paling luang.</p>
                                            </li>
                                            <li class="flex gap-3 items-start">
                                                <div
                                                    class="h-6 w-6 rounded-full bg-indigo-50 flex items-center justify-center shrink-0">
                                                    <svg class="h-4 w-4 text-indigo-600" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zm-4 0H9v2h2V9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <p class="text-sm text-neutral-500 font-medium">Diskusi teknis mendalam
                                                    dengan developer.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Toast Notification -->
                        <div x-show="toast" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="translate-y-20 opacity-0"
                            x-transition:enter-end="translate-y-0 opacity-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="translate-y-0 opacity-100"
                            x-transition:leave-end="translate-y-20 opacity-0"
                            class="fixed bottom-10 left-1/2 -translate-x-1/2 z-50">
                            <div
                                class="bg-neutral-900 text-white px-8 py-4 rounded-3xl shadow-2xl flex items-center gap-4">
                                <div
                                    class="h-8 w-8 rounded-full bg-emerald-500 flex items-center justify-center text-white">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="font-bold text-sm" x-text="toastMsg"></span>
                            </div>
                        </div>
                    </section>
                </div>
            </section>

            <!-- Kontak -->
            <section id="kontak" class="py-24 bg-white relative overflow-hidden">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <!-- Contact Info -->
                        <div data-reveal>
                            <h2 class="text-4xl font-extrabold text-neutral-900 tracking-tight">Kembangkan Ide Bersama Kami
                            </h2>
                            <div class="h-1.5 w-20 bg-indigo-600 rounded-full mt-6 mb-8"></div>
                            <p class="text-lg text-neutral-600 mb-10 leading-relaxed">
                                Punya pertanyaan teknis atau ingin mendiskusikan workflow projek Anda? Tim engineer kami
                                siap memberikan solusi terbaik yang relevan dengan kebutuhan bisnis Anda.
                            </p>

                            <div class="space-y-6">
                                @forelse(($contacts ?? []) as $c)
                                    <div class="flex items-center gap-5 group">
                                        <div
                                            class="h-12 w-12 rounded-2xl bg-neutral-50 flex items-center justify-center text-neutral-400 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                            @if (str_contains(strtolower($c->type), 'wa') || str_contains(strtolower($c->type), 'phone'))
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                            @else
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-neutral-400 uppercase tracking-widest">
                                                {{ $c->label ?? ucfirst($c->type) }}</p>
                                            <p class="text-neutral-900 font-bold text-lg">{{ $c->value }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <!-- Fallback UI -->
                                    <div class="flex items-center gap-5 group">
                                        <div
                                            class="h-12 w-12 rounded-2xl bg-neutral-50 flex items-center justify-center text-neutral-400 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                            <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-neutral-400 uppercase tracking-widest">Email
                                                Resmi</p>
                                            <p class="text-neutral-900 font-bold text-lg">engineertekno@gmail.com</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>

                            <div class="mt-12 pt-10 border-t border-neutral-100">
                                <p class="text-sm font-bold text-neutral-400 uppercase tracking-widest mb-4">Lokasi Kami
                                </p>
                                <p class="text-neutral-600 font-medium leading-relaxed">Syntaxtrust HQ<br>Indonesia,
                                    Jawabarat</p>
                            </div>
                        </div>

                        <!-- WhatsApp Box -->
                        <div class="relative" data-reveal>
                            <div class="absolute -inset-4 bg-indigo-50/50 rounded-[3rem] -z-10 blur-2xl"></div>
                            <div
                                class="bg-white rounded-[2.5rem] border border-neutral-100 shadow-xl p-8 sm:p-10 text-center">
                                <h3 class="text-2xl font-bold text-neutral-900 mb-4">Fast Response</h3>
                                <p class="text-neutral-600 mb-8">Chat langsung dengan tim kami melalui WhatsApp untuk
                                    respon yang lebih cepat.</p>

                                <a href="https://wa.me/{{ preg_replace('/\D/', '', $contacts->where('type', 'whatsapp')->first()->value ?? '6285156553226') }}?text=Halo%20SyntaxTrust,%20saya%20ingin%20diskusi%20project"
                                    target="_blank"
                                    class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-xl bg-emerald-500 text-white font-bold text-lg hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-200 hover:-translate-y-1">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                    </svg>
                                    Chat via WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        @endsection
