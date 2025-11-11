@extends('layouts.app')

@section('content')
    <style>
        .hero-gradient {
            position: absolute;
            inset: -60% -30% auto;
            width: 200%;
            height: 200%;
            transform-origin: center;
            animation: heroGradient 22s ease-in-out infinite alternate;
            opacity: 0.85;
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
            background: linear-gradient(90deg, rgba(255,255,255,0.85) 0%, rgba(255,255,255,0.65) 45%, rgba(255,255,255,0) 100%);
        }

        .tech-fade-right {
            background: linear-gradient(270deg, rgba(255,255,255,0.85) 0%, rgba(255,255,255,0.65) 45%, rgba(255,255,255,0) 100%);
        }

        body.theme-night .tech-fade-left {
            background: linear-gradient(90deg, rgba(15,23,42,0.9) 0%, rgba(15,23,42,0.6) 40%, rgba(15,23,42,0) 100%);
        }

        body.theme-night .tech-fade-right {
            background: linear-gradient(270deg, rgba(15,23,42,0.9) 0%, rgba(15,23,42,0.6) 40%, rgba(15,23,42,0) 100%);
        }

        .themed-panel {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .themed-panel-overlay {
            background: linear-gradient(180deg, rgba(248,250,252,0.65) 0%, rgba(255,255,255,0) 100%);
        }

        body.theme-night .themed-panel {
            background: linear-gradient(180deg, rgba(15,23,42,0.92) 0%, rgba(15,23,42,0.86) 100%);
        }

        body.theme-night .themed-panel-overlay {
            background: linear-gradient(180deg, rgba(15,23,42,0.6) 0%, rgba(15,23,42,0) 100%);
        }

        .typewriter-shell {
            background: rgba(255,255,255,0.92);
            border-color: rgba(226,232,240,0.7);
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
            background: rgba(15,23,42,0.92);
            border-color: rgba(148,163,184,0.35);
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
            background: rgba(255,255,255,0.9);
            border-color: rgba(226,232,240,0.6);
        }

        .scheduler-shell .preview-title {
            color: #475569;
        }

        .scheduler-shell .preview-text {
            background: rgba(248,250,252,0.9);
            color: #0f172a;
        }

        body.theme-night .scheduler-shell {
            background: rgba(15,23,42,0.9);
            border-color: rgba(148,163,184,0.35);
        }

        body.theme-night .scheduler-shell .preview-title {
            color: #a5b4fc;
        }

        body.theme-night .scheduler-shell .preview-text {
            background: rgba(30,41,59,0.75);
            color: #e2e8f0;
        }

        .tilt-copy {
            color: #475569;
        }

        body.theme-night .tilt-copy {
            color: #cbd5f5;
        }

        .tilt-card {
            background: rgba(255,255,255,0.92);
            border: 1px solid rgba(226,232,240,0.7);
            will-change: transform;
            transform-style: preserve-3d;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .tilt-card:hover {
            box-shadow: 0 35px 55px -35px rgba(79, 70, 229, 0.35);
        }

        body.theme-night .tilt-card {
            background: rgba(15,23,42,0.9);
            border-color: rgba(148,163,184,0.35);
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
            background: linear-gradient(120deg, rgba(255,255,255,0.3), rgba(255,255,255,0));
            opacity: 0.4;
            z-index: -1;
        }

        @keyframes badgeBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }

        .testimonial-thumb {
            background: rgba(248,250,252,0.82);
            border: 1px solid rgba(226,232,240,0.6);
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
            backdrop-filter: blur(6px);
        }

        .testimonial-thumb:hover {
            border-color: rgba(148,163,184,0.75);
            transform: translateY(-2px);
        }

        .testimonial-thumb-active {
            border-color: rgba(79,70,229,0.7);
            background: rgba(79,70,229,0.12);
            box-shadow: 0 18px 36px -28px rgba(79,70,229,0.55);
        }

        body.theme-night .testimonial-thumb {
            background: rgba(15,23,42,0.82);
            border-color: rgba(148,163,184,0.3);
            color: #e2e8f0;
        }

        body.theme-night .testimonial-thumb:hover {
            border-color: rgba(148,163,184,0.5);
        }

        body.theme-night .testimonial-thumb-active {
            background: rgba(79,70,229,0.28);
            border-color: rgba(129,140,248,0.65);
            box-shadow: 0 20px 42px -30px rgba(59,130,246,0.6);
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
            0%, 49% { opacity: 1; }
            50%, 100% { opacity: 0; }
        }

        .tech-card {
            background: rgba(255,255,255,0.9);
            border: 1px solid rgba(226,232,240,0.7);
            backdrop-filter: blur(6px);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .tech-card:hover {
            border-color: rgba(129,140,248,0.45);
            box-shadow: 0 25px 50px -25px rgba(99,102,241,0.4);
            transform: translateY(-2px);
        }

        body.theme-night .tech-card {
            background: rgba(15,23,42,0.92);
            border-color: rgba(148,163,184,0.35);
            box-shadow: inset 0 0 0 1px rgba(15,23,42,0.6);
        }

        body.theme-night .tech-card:hover {
            border-color: rgba(99,102,241,0.55);
            box-shadow: 0 30px 60px -35px rgba(79,70,229,0.6);
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
    </style>

    <!-- Hero -->
    <section class="relative overflow-hidden transition-colors duration-500" x-data="heroTheme()" x-init="init()" :class="theme==='night' ? 'bg-slate-950 text-white' : 'bg-neutral-50 text-neutral-900'">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="hero-gradient" :class="theme"></div>
            <template x-for="p in particles" :key="p.id">
                <span :class="['hero-particle', theme]" :style="particleStyle(p)"></span>
            </template>
        </div>

        <div class="absolute top-6 right-6 z-20 flex items-center gap-2 text-xs">
            <span class="font-semibold uppercase tracking-wider" :class="theme==='night' ? 'text-indigo-200' : 'text-indigo-600'">Tema</span>
            <button type="button" @click="toggle()" class="inline-flex items-center gap-2 rounded-full border px-3 py-1.5 backdrop-blur-sm transition" :class="theme==='night' ? 'border-white/30 bg-white/10 text-white hover:bg-white/20' : 'border-indigo-200 bg-white/80 text-indigo-700 hover:bg-white'">
                <span x-text="theme==='night' ? 'Mode Siang' : 'Mode Malam'" class="font-medium"></span>
                <span class="text-base" x-text="theme==='night' ? '☀️' : '🌙'"></span>
            </button>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div data-reveal :class="theme==='night' ? 'text-neutral-100' : ''">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight">
                        SyntaxTrust
                        <span class="block" :class="theme==='night' ? 'text-indigo-300' : 'text-indigo-600'">Jasa Pembuatan & Modifikasi Website</span>
                    </h1>
                    <p class="mt-5 text-lg" :class="theme==='night' ? 'text-neutral-300' : 'text-neutral-600'">Kami menerima pembuatan website tugas kuliah, modifikasi website yang sudah ada, hingga pembuatan website dari nol. Harga fleksibel dapat dinegosiasikan sesuai scope dan tingkat kerumitan.</p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="#kontak" class="group relative px-5 py-3 rounded-xl bg-indigo-600 text-white transition hover:bg-indigo-500 active:scale-[0.98]">
                            <span class="absolute inset-0 rounded-xl bg-white/20 opacity-0 group-hover:opacity-100 transition"></span>
                            <span class="relative">Konsultasi Gratis</span>
                        </a>
                        <a href="#layanan" class="group relative px-5 py-3 rounded-xl border active:scale-[0.98]" :class="theme==='night' ? 'border-white/40 text-white hover:border-white/70' : 'border-neutral-300 hover:border-neutral-400'">
                            <span class="absolute inset-0 rounded-xl" :class="theme==='night' ? 'bg-white/10 opacity-0 group-hover:opacity-100 transition' : 'bg-neutral-100/50 opacity-0 group-hover:opacity-100 transition'"></span>
                            <span class="relative" :class="theme==='night' ? 'text-white' : ''">Lihat Layanan</span>
                        </a>
                    </div>
                    <div class="mt-6 text-sm" :class="theme==='night' ? 'text-neutral-400' : 'text-neutral-500'">Waktu pengerjaan cepat. Revisi sewajarnya. Dukungan pasca-deploy.</div>
                </div>
                <div class="relative" data-reveal>
                    <div class="mx-auto max-w-sm rounded-3xl border border-neutral-200/70 backdrop-blur-sm shadow-xl p-6 typewriter-shell" x-data="typewriterCard()" x-init="init()">
                        <div class="flex flex-wrap justify-center gap-2">
                            <template x-for="(item, i) in items" :key="i">
                                <button type="button" class="relative px-3 py-1.5 rounded-full text-sm transition border"
                                        :class="index===i ? 'text-white shadow-lg shadow-neutral-900/20' : 'bg-white/80 text-neutral-600 hover:border-neutral-300'"
                                        :style="index===i ? `background:${item.accent}; border-color:${item.accent};` : 'border-color:rgba(148,163,184,0.5);'"
                                        @click="select(i)"
                                        x-text="item.label"></button>
                            </template>
                        </div>

                        <div class="mt-6 border border-neutral-200/70 rounded-2xl bg-white/95">
                            <div class="flex items-center gap-1 px-5 pt-4 pb-3 text-[10px] font-semibold tracking-[0.35em] text-neutral-400 uppercase">
                                <span class="h-2 w-2 rounded-full bg-rose-400"></span>
                                <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                <span class="ml-auto">TYPE</span>
                            </div>
                            <div class="px-5 pb-6">
                                <div class="flex items-center gap-3">
                                    <div class="h-12 w-12 rounded-2xl bg-neutral-900 text-white grid place-items-center text-2xl shadow-inner shadow-neutral-900/40" x-text="current?.emoji"></div>
                                    <div>
                                        <div class="font-semibold typewriter-title" x-text="current?.title"></div>
                                        <div class="text-xs uppercase tracking-wide typewriter-tagline" x-text="current?.tagline"></div>
                                    </div>
                                </div>
                                <div class="mt-5 font-mono text-[1.1rem] leading-relaxed typewriter-typed min-h-[3.5rem]">
                                    <span x-text="displayText"></span>
                                    <span class="inline-block w-2 translate-y-0.5 border-l-2 border-indigo-500" :class="caretVisible ? 'opacity-100' : 'opacity-0'"></span>
                                </div>
                                <p class="mt-4 text-sm typewriter-subtitle" x-text="current?.subtitle"></p>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-center gap-3">
                            <button type="button" class="h-9 w-9 rounded-full border border-neutral-200/80 bg-white text-neutral-500 hover:text-neutral-900 hover:border-neutral-300 transition" @click="prev()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4 mx-auto"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 6l-6 6 6 6"/></svg>
                            </button>
                            <button type="button" class="h-9 w-9 rounded-full border border-neutral-200/80 bg-white text-neutral-500 hover:text-neutral-900 hover:border-neutral-300 transition" @click="next()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4 mx-auto"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 18l6-6-6-6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teknologi yang Digunakan -->
    <section class="bg-white" x-data="techCarousel()" x-init="init()" @mouseenter="pause()" @mouseleave="resume()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h2 class="text-2xl font-bold text-center" data-reveal>Teknologi yang Digunakan</h2>
            <p class="mt-2 text-neutral-600 text-center" data-reveal>Stack modern untuk hasil yang optimal.</p>
            <div class="relative mt-8">
                <div class="pointer-events-none absolute inset-y-0 left-0 w-16 tech-fade-left hidden sm:block"></div>
                <div class="pointer-events-none absolute inset-y-0 right-0 w-16 tech-fade-right hidden sm:block"></div>
                <button type="button" class="hidden sm:flex absolute left-0 top-1/2 -translate-y-1/2 z-10 h-10 w-10 items-center justify-center rounded-full border border-neutral-200 bg-white shadow hover:bg-neutral-50" @click="scroll(-1)" aria-label="Teknologi sebelumnya">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 6l-6 6 6 6"/></svg>
                </button>
                <button type="button" class="hidden sm:flex absolute right-0 top-1/2 -translate-y-1/2 z-10 h-10 w-10 items-center justify-center rounded-full border border-neutral-200 bg-white shadow hover:bg-neutral-50" @click="scroll(1)" aria-label="Teknologi berikutnya">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 18l6-6-6-6"/></svg>
                </button>
                <div class="overflow-hidden" x-ref="track">
                    <div class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-2 [-ms-overflow-style:none] [scrollbar-width:none]" style="scrollbar-width:none;" x-ref="inner" @scroll.debounce.120ms="onScroll()">
                        @php
                            $techGroups = collect($technologies ?? [])->chunk(6); // 6 per slide (2 rows x 3 columns)
                        @endphp
                        @forelse($techGroups as $group)
                            <div class="tech-slide snap-start min-w-full sm:min-w-[540px] lg:min-w-[680px]" data-reveal>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                    @foreach($group as $tech)
                                        @php
                                            $color = $tech->color ?: '#EEF2FF';
                                            $style = "--tech-color: {$color}";
                                            $bg = 'bg-white';
                                        @endphp
                                        <div class="tech-card rounded-xl border border-neutral-200 bg-white shadow-sm hover:shadow-md transition px-4 py-4 flex items-center gap-3" style="{{ $style }}">
                                            <div class="h-10 w-10 rounded-xl flex items-center justify-center text-white font-semibold shadow" style="background: var(--tech-color);">
                                                @if($tech->icon && \Illuminate\Support\Str::startsWith($tech->icon, ['http://','https://','/']))
                                                    <img src="{{ $tech->icon }}" alt="{{ $tech->name }}" class="h-8 w-8 object-contain">
                                                @elseif($tech->icon)
                                                    <i class="{{ $tech->icon }} text-lg"></i>
                                                @else
                                                    {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($tech->name,0,1)) }}
                                                @endif
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold tech-card-title">{{ $tech->name }}</div>
                                                @if($tech->color)
                                                    <div class="text-xs tech-card-meta">{{ $tech->color }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    @for($i=$group->count(); $i<6; $i++)
                                        <div class="hidden sm:block"></div>
                                    @endfor
                                </div>
                            </div>
                        @empty
                            <div class="w-full text-center text-neutral-500 py-6">Belum ada teknologi yang ditampilkan.</div>
                        @endforelse
                    </div>
                </div>
                <template x-if="slidesCount > 1">
                    <div class="mt-6 flex justify-center gap-2">
                        <template x-for="idx in pages()" :key="idx">
                            <button type="button" class="h-2.5 w-2.5 rounded-full transition" :class="idx===index ? 'bg-indigo-600 w-6' : 'bg-neutral-300'" @click="go(idx)" aria-label="Loncat ke slide"/>
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- Layanan -->
    <section id="layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-2xl font-bold">Layanan</h2>
        <p class="mt-2 text-neutral-600">Pilih layanan sesuai kebutuhan proyek Anda.</p>
        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach(($services ?? []) as $idx => $svc)
                <div x-data="tiltCard()" @mousemove="move($event)" @mouseleave="reset()" class="relative" style="perspective: 1200px;">
                    <div class="group relative rounded-xl tilt-card p-6" :style="cardStyle">
                        <div class="absolute -inset-px rounded-xl bg-gradient-to-br from-indigo-600/0 to-violet-600/0 opacity-0 group-hover:opacity-10 transition"></div>
                        @if($idx === 0)
                            <div class="tilt-card-badge -top-5 left-6">
                                <span class="inline-flex h-2 w-2 rounded-full bg-white animate-pulse"></span>
                                FAVORIT CLIENT
                            </div>
                        @endif
                        <div class="relative h-10 w-10 rounded-lg bg-indigo-600/10 text-indigo-600 grid place-items-center group-hover:scale-110 transition">
                            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 24 24' fill='none' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 7h18M3 12h18M3 17h18'/></svg>
                        </div>
                        <h3 class="mt-4 font-semibold">{{ $svc->title }}</h3>
                        <p class="mt-1 text-sm tilt-copy">{{ $svc->excerpt ?? Str::limit($svc->description, 120) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    
    <!-- Kenapa Memilih SyntaxTrust -->
    <section class="relative themed-panel">
        <div class="pointer-events-none absolute inset-0 themed-panel-overlay"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <h2 class="text-2xl font-bold">Kenapa Memilih Kami</h2>
            <p class="mt-2 text-neutral-600 micro-typewriter" x-data="microTypewriter([
                'Fokus pada hasil, kecepatan, dan komunikasi yang jelas.',
                'Selalu transparan soal scope, biaya, dan timeline.',
                'Tim siap bantu dari perencanaan hingga pasca-deploy.'
            ])" x-init="init()">
                <span x-text="display"></span>
                <span class="micro-caret"></span>
            </p>
            <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl border border-neutral-200 p-6 transition hover:shadow-lg hover:-translate-y-0.5">
                    <div class="h-10 w-10 rounded-lg bg-neutral-900 text-white grid place-items-center">
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 24 24' fill='none' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'/></svg>
                    </div>
                    <div class="mt-4 font-semibold">Hasil Berkualitas</div>
                    <p class="mt-1 text-sm text-neutral-600">Koding rapi, akses cepat, SEO dasar, dan desain responsif.</p>
                </div>
                <div class="rounded-2xl border border-neutral-200 p-6 transition hover:shadow-lg hover:-translate-y-0.5">
                    <div class="h-10 w-10 rounded-lg bg-neutral-900 text-white grid place-items-center">
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 24 24' fill='none' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z'/></svg>
                    </div>
                    <div class="mt-4 font-semibold">Transparan & Fleksibel</div>
                    <p class="mt-1 text-sm text-neutral-600">Estimasi dan scope jelas. Harga bisa dinego sesuai kebutuhan.</p>
                </div>
                <div class="rounded-2xl border border-neutral-200 p-6 transition hover:shadow-lg hover:-translate-y-0.5">
                    <div class="h-10 w-10 rounded-lg bg-neutral-900 text-white grid place-items-center">
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 24 24' fill='none' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 8v8m4-4H8'/></svg>
                    </div>
                    <div class="mt-4 font-semibold">Skalabel</div>
                    <p class="mt-1 text-sm text-neutral-600">Mudah dikembangkan dari landing page ke fitur lanjut.</p>
                </div>
                <div class="rounded-2xl border border-neutral-200 p-6 transition hover:shadow-lg hover:-translate-y-0.5">
                    <div class="h-10 w-10 rounded-lg bg-neutral-900 text-white grid place-items-center">
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 24 24' fill='none' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 7h18M3 12h14M3 17h10'/></svg>
                    </div>
                    <div class="mt-4 font-semibold">Teknologi Modern</div>
                    <p class="mt-1 text-sm text-neutral-600">Laravel 12, Tailwind v4, Vite, dan Alpine untuk interaksi cepat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik -->
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl border border-neutral-200 p-6 text-center" data-reveal x-data="statCounter({ end: {{ max(0, (int)($projectsCount ?? 0)) }}, suffix: '+' })" x-intersect.once="start()">
                    <div class="text-3xl font-bold transition-transform duration-300" :class="animate ? 'scale-110 text-indigo-600' : ''"><span x-text="formatted()"></span></div>
                    <div class="mt-1 text-sm text-neutral-600">Project Selesai</div>
                </div>
                <div class="rounded-2xl border border-neutral-200 p-6 text-center" data-reveal x-data="statCounter({ end: {{ max(0, (int)($happyClients ?? 0)) }}, suffix: '+' })" x-intersect.once="start()">
                    <div class="text-3xl font-bold transition-transform duration-300" :class="animate ? 'scale-110 text-indigo-600' : ''"><span x-text="formatted()"></span></div>
                    <div class="mt-1 text-sm text-neutral-600">Klien Puas</div>
                </div>
                <div class="rounded-2xl border border-neutral-200 p-6 text-center" data-reveal x-data="statCounter({ end: {{ max(1, (int)($yearsExperience ?? 1)) }}, suffix: '+' , duration: 1600 })" x-intersect.once="start()">
                    <div class="text-3xl font-bold transition-transform duration-300" :class="animate ? 'scale-110 text-indigo-600' : ''"><span x-text="formatted()"></span></div>
                    <div class="mt-1 text-sm text-neutral-600">Tahun Pengalaman</div>
                </div>
                <div class="rounded-2xl border border-neutral-200 p-6 text-center" data-reveal x-data="statCounter({ end: {{ max(0, min(100, (int)($avgSatisfaction ?? 0))) }}, suffix: '%' , duration: 1200 })" x-intersect.once="start()">
                    <div class="text-3xl font-bold transition-transform duration-300" :class="animate ? 'scale-110 text-indigo-600' : ''"><span x-text="formatted()"></span></div>
                    <div class="mt-1 text-sm text-neutral-600">Kepuasan Klien</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Proses Kerja -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-2xl font-bold">Proses Kerja</h2>
        <p class="mt-2 text-neutral-600">Alur sederhana dari ide hingga live.</p>
        <div class="mt-8 grid gap-6 md:grid-cols-4">
            @foreach(($process ?? []) as $idx => $ps)
                <div x-data="{h:false}" @mouseenter="h=true" @mouseleave="h=false" class="rounded-2xl border border-neutral-200 p-6 transition" :class="h ? 'shadow-lg ring-1 ring-indigo-200' : ''">
                    <div class="text-sm text-neutral-500">{{ sprintf('%02d', $idx+1) }}</div>
                    <div class="mt-2 font-semibold">{{ $ps->title }}</div>
                    <p class="mt-1 text-sm text-neutral-600">{{ $ps->description }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Timeline Proyek -->
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{step:1, steps:[
            @foreach(($timeline ?? []) as $t){ k:'{{ addslashes($t->title) }}', d:'{{ addslashes($t->description) }}' }@if(!$loop->last),@endif @endforeach
        ]}">
            <h2 class="text-2xl font-bold text-center" data-reveal>Timeline Proyek</h2>
            <p class="mt-2 text-neutral-600 text-center" data-reveal>Dari brief hingga live dengan tahapan jelas.</p>

            <div class="mt-10 relative">
                <div class="absolute left-0 right-0 top-5 h-1 bg-neutral-200 rounded-full"></div>
                <div class="absolute left-0 top-5 h-1 bg-indigo-600 rounded-full transition-all duration-500" :style="`right: calc(100% - ${(step-1)/(steps.length-1)*100}%);`"></div>

                <div class="relative z-10 grid grid-cols-5 gap-2 pt-8">
                    <template x-for="(s, idx) in steps" :key="idx">
                        <div class="flex flex-col items-center">
                            <button @click="step=idx+1" class="relative z-20 h-10 w-10 rounded-full grid place-items-center border transition"
                                    :class="idx+1<=step ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white border-neutral-300'">
                                <span x-text="idx+1"></span>
                            </button>
                            <div class="mt-3 text-sm font-medium" x-text="s.k"></div>
                            <div class="text-xs text-neutral-600 mt-1 text-center" x-text="s.d"></div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni (Carousel Imersif) -->
    <section class="bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="testimonialCarousel(@js($testimonialItems ?? []))" x-init="init()">
            <h2 class="text-2xl font-bold text-center" data-reveal>Apa Kata Klien</h2>
            <p class="mt-2 text-neutral-600 text-center" data-reveal>Testimoni dari klien yang telah menggunakan layanan kami.</p>
            <div class="mt-8 relative" x-show="items.length">
                <div class="overflow-hidden rounded-3xl border border-neutral-200 bg-white/95 shadow-lg" x-ref="panel"
                     @mouseenter="stop()" @mouseleave="start()"
                     @touchstart.passive="sx=$event.touches[0].clientX" @touchend.passive="dx=$event.changedTouches[0].clientX; if(sx-dx>40) next(); if(dx-sx>40) prev();">
                    <template x-for="(item, idx) in items" :key="idx">
                        <article :data-index="idx" x-show="index===idx" x-transition.opacity.duration.300ms class="grid gap-6 sm:grid-cols-[64px,1fr] items-start px-8 py-10 relative" x-intersect="observe($el)">
                            <div class="hidden sm:block">
                                <template x-if="item.avatar">
                                    <img :src="item.avatar" class="h-16 w-16 rounded-full object-cover border border-neutral-200 shadow-sm" alt="avatar">
                                </template>
                                <template x-if="!item.avatar">
                                    <div class="h-16 w-16 rounded-full grid place-items-center bg-indigo-600/15 text-indigo-600 font-semibold">
                                        <span x-text="(item.name||'?').slice(0,1)"></span>
                                    </div>
                                </template>
                            </div>
                            <div class="relative">
                                <div class="absolute -left-6 -top-4 h-12 w-12 rounded-full bg-indigo-500/10 text-indigo-500 grid place-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M7.17 6A5.17 5.17 0 0 0 2 11.17V22h8.27v-8.27H6.1c0-2.28 1.1-3.34 3.45-4.65L7.17 6Zm10 0A5.17 5.17 0 0 0 12 11.17V22h8.27v-8.27h-4.17c0-2.28 1.1-3.34 3.45-4.65L17.17 6Z"/></svg>
                                </div>
                                <header class="pl-6">
                                    <h3 class="text-lg font-semibold testimonial-title" :style="titleStyle(idx)" x-text="item.title || item.name"></h3>
                                </header>
                                <p class="mt-5 text-lg leading-relaxed testimonial-quote" :style="quoteStyle(idx)" x-text="`“ ${item.text} ”`"></p>
                                <footer class="mt-6 flex items-center justify-between flex-wrap gap-3 pl-6">
                                    <div class="text-sm font-medium testimonial-meta"><span x-text="item.name"></span> <span x-show="item.role" x-text="`· ${item.role}`"></span></div>
                                    <div class="flex items-center gap-0.5" aria-label="rating">
                                        <template x-for="r in 5" :key="r"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" :class="r<=item.rating ? 'text-amber-500 fill-current' : 'text-neutral-300 fill-current'"><path d="M12 .587l3.668 7.431L24 9.753l-6 5.848 1.417 8.268L12 19.771l-7.417 4.098L6 15.601 0 9.753l8.332-1.735z"/></svg></template>
                                    </div>
                                </footer>
                            </div>
                        </article>
                    </template>
                </div>
                <div class="absolute inset-x-10 -bottom-2 h-1 bg-neutral-200 rounded-full overflow-hidden">
                    <div class="h-full bg-neutral-900/70" :style="`width:${progress}%`"></div>
                </div>
                <button type="button" class="absolute left-0 top-1/2 -translate-y-1/2 m-3 h-10 w-10 rounded-full border border-neutral-200 bg-white shadow hover:bg-neutral-50 hidden sm:flex items-center justify-center" @click="prev()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 6l-6 6 6 6"/></svg>
                </button>
                <button type="button" class="absolute right-0 top-1/2 -translate-y-1/2 m-3 h-10 w-10 rounded-full border border-neutral-200 bg-white shadow hover:bg-neutral-50 hidden sm:flex items-center justify-center" @click="next()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 18l6-6-6-6"/></svg>
                </button>

                <div class="mt-12 grid gap-4 sm:grid-cols-3" x-show="items.length">
                    <template x-for="(item, idx) in items" :key="`thumb-${idx}`">
                        <button type="button" class="testimonial-thumb rounded-2xl p-4 text-left flex items-center gap-4" :class="index===idx ? 'testimonial-thumb-active' : ''" @click="go(idx)">
                            <div class="h-12 w-12 rounded-full overflow-hidden border border-current/20 flex-shrink-0">
                                <template x-if="item.avatar">
                                    <img :src="item.avatar" class="h-full w-full object-cover" alt="avatar">
                                </template>
                                <template x-if="!item.avatar">
                                    <div class="h-full w-full grid place-items-center bg-indigo-500/15 text-indigo-500 font-semibold" x-text="(item.name||'?').slice(0,1)"></div>
                                </template>
                            </div>
                            <div class="text-sm">
                                <div class="font-semibold" x-text="item.name"></div>
                                <div class="text-xs opacity-70" x-text="item.role || 'Klien' "></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>
            <template x-if="!items.length">
                <div class="mt-8 rounded-2xl border border-dashed border-neutral-300 bg-white/70 p-10 text-center text-neutral-500">Belum ada testimoni</div>
            </template>
        </div>
    </section>

    <!-- Jadwalkan Pertemuan -->
    <section id="jadwal" class="bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{
            name:'', when:'', method:'meet', topic:'', link:'', toast:false, toastMsg:'Terkirim. Lanjutkan di WhatsApp.', tz: Intl.DateTimeFormat().resolvedOptions().timeZone, remember:false,
            submitting:false,
            touched:{ name:false, when:false, topic:false, link:false },
            get wa(){ return (window.WHATSAPP_NUMBER||'6285156553226') },
            get whenText(){ const d=new Date(this.when); return isNaN(d)? this.when : d.toLocaleString('id-ID'); },
            get validLink(){ if(this.method!=='meet') return true; if(!this.link) return true; return /^https?:\/\/meet\.google\.com\/[a-z0-9\-]+/i.test(this.link); },
            get validWhen(){ const d=new Date(this.when); if(isNaN(d)) return false; return d.getTime() >= (Date.now() - 5*60*1000); },
            get nameValid(){ return this.name.trim().length >= 3; },
            get topicValid(){ return this.topic.trim().length >= 5; },
            get methodValid(){ return !!this.method; },
            get formValid(){ return this.nameValid && this.validWhen && this.topicValid && this.methodValid && this.validLink; },
            get stepsState(){ return [
                { label: 'Data Diri', done: this.nameValid },
                { label: 'Jadwal', done: this.validWhen },
                { label: 'Topik', done: this.topicValid },
                { label: 'Metode', done: this.methodValid }
            ]; },
            get progressPercent(){ const steps = this.stepsState; const total = steps.length || 1; const done = steps.filter(s => s.done).length; return Math.round(done / total * 100); },
            fmt(dt){ const p=n=>String(n).padStart(2,'0'); return `${dt.getFullYear()}-${p(dt.getMonth()+1)}-${p(dt.getDate())}T${p(dt.getHours())}:${p(dt.getMinutes())}`; },
            preset(t){ const d=new Date(); if(t==='today-19'){ d.setHours(19,0,0,0);} if(t==='tom-10'){ d.setDate(d.getDate()+1); d.setHours(10,0,0,0);} if(t==='tom-19'){ d.setDate(d.getDate()+1); d.setHours(19,0,0,0);} if(t==='day2-10'){ d.setDate(d.getDate()+2); d.setHours(10,0,0,0);} this.when=this.fmt(d); },
            get msg(){
                let m = `Halo SyntaxTrust,%0A`+
                        `Saya ${this.name||'-'} ingin menjadwalkan pertemuan.%0A`+
                        `Waktu: ${this.whenText||'-'}%0A`+
                        `Metode: ${this.method==='meet'?'Google Meet':'WhatsApp'}%0A`+
                        `Topik: ${this.topic||'-'}`;
                if(this.method==='meet' && this.link){ m += `%0ALink: ${this.link}` }
                return m;
            },
            submit(){
                this.touched.name = true;
                this.touched.when = true;
                this.touched.topic = true;
                if(this.method==='meet' && this.link){ this.touched.link = true; }
                if(!this.formValid || this.submitting) return;
                this.submitting = true;
                window.open(`https://wa.me/${this.wa}?text=${this.msg}`,'_blank');
                this.toast=true; setTimeout(()=>this.toast=false,2500);
                setTimeout(()=>{ this.submitting=false; }, 1200);
            },
            save(){
                if(!this.remember){ localStorage.removeItem('schedulerDraft'); localStorage.removeItem('schedulerRemember'); return; }
                localStorage.setItem('schedulerRemember','1');
                localStorage.setItem('schedulerDraft', JSON.stringify({name:this.name,when:this.when,method:this.method,topic:this.topic,link:this.link}));
            },
            load(){
                try{
                    this.remember = localStorage.getItem('schedulerRemember')==='1';
                    if(!this.remember) return;
                    const d=JSON.parse(localStorage.getItem('schedulerDraft')||'{}');
                    this.name=d.name||''; this.when=d.when||''; this.method=d.method||'meet'; this.topic=d.topic||''; this.link=d.link||'';
                }catch(e){}
            },
            resetAll(){ this.name=''; this.when=''; this.method='meet'; this.topic=''; this.link=''; this.remember=false; this.touched={name:false,when:false,topic:false,link:false}; localStorage.removeItem('schedulerDraft'); localStorage.removeItem('schedulerRemember'); }
        }" x-init="load(); $watch('name', ()=>save()); $watch('when', ()=>save()); $watch('method', ()=>save()); $watch('topic', ()=>save()); $watch('link', ()=>save()); $watch('remember', ()=>save());">
            <h2 class="text-2xl font-bold text-center" data-reveal>Jadwalkan Pertemuan</h2>
            <p class="mt-2 text-neutral-600 text-center" data-reveal>Tentukan jadwal Anda sendiri dan kirim otomatis ke WhatsApp kami.</p>

            <div class="mt-8 grid lg:grid-cols-2 gap-8">
                <form @submit.prevent="submit()" class="relative z-10 rounded-2xl border border-neutral-200 bg-white p-6 grid gap-4 scheduler-shell" data-reveal>
                    <div>
                        <div class="flex items-center justify-between text-xs text-neutral-500">
                            <div class="font-semibold text-neutral-700">Progress Form</div>
                            <div x-text="progressPercent + '%'" class="font-medium text-indigo-600"></div>
                        </div>
                        <div class="mt-2 h-1.5 w-full rounded-full bg-neutral-200 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-indigo-500 via-purple-500 to-emerald-500 transition-all duration-300" :style="`width:${progressPercent}%`"></div>
                        </div>
                        <div class="mt-2 grid grid-cols-4 gap-2 text-[0.65rem] uppercase tracking-wide text-neutral-400">
                            <template x-for="step in stepsState" :key="step.label">
                                <div class="flex items-center gap-1" :class="step.done ? 'text-indigo-600 font-semibold' : ''">
                                    <span class="inline-flex h-2 w-2 rounded-full" :class="step.done ? 'bg-indigo-500' : 'bg-neutral-300'"></span>
                                    <span x-text="step.label"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">Nama</label>
                            <input x-model="name" @blur="touched.name=true" type="text" class="w-full rounded-lg border px-3 py-2" :class="(touched.name && !nameValid) ? 'border-red-400 focus:ring-red-200 focus:border-red-400' : 'border-neutral-300'" required>
                            <p x-show="touched.name && !nameValid" class="mt-1 text-xs text-red-500">Nama minimal 3 karakter.</p>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Tanggal & Waktu</label>
                            <div>
                                <input x-model="when" @blur="touched.when=true" type="datetime-local" class="w-full rounded-lg border px-3 py-2" :class="(touched.when && !validWhen) ? 'border-red-400 focus:ring-red-200 focus:border-red-400' : 'border-neutral-300'" required>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    <button type="button" @click="preset('today-19')" class="px-2.5 py-1.5 rounded-lg border border-neutral-300 text-xs hover:bg-neutral-50">Hari ini 19:00</button>
                                    <button type="button" @click="preset('tom-10')" class="px-2.5 py-1.5 rounded-lg border border-neutral-300 text-xs hover:bg-neutral-50">Besok 10:00</button>
                                    <button type="button" @click="preset('tom-19')" class="px-2.5 py-1.5 rounded-lg border border-neutral-300 text-xs hover:bg-neutral-50">Besok 19:00</button>
                                    <div x-data="{open:false}" class="relative">
                                        <button type="button" @click="open=!open" class="px-2.5 py-1.5 rounded-lg border border-neutral-300 text-xs hover:bg-neutral-50">Lainnya</button>
                                        <div x-show="open" @click.outside="open=false" x-transition class="absolute left-0 z-40 mt-1 w-44 rounded-lg border border-neutral-200 bg-white shadow-lg">
                                            <button type="button" @click="preset('day2-10'); open=false" class="block w-full text-left px-3 py-1.5 text-xs hover:bg-neutral-50">Lusa 10:00</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-1 text-xs text-neutral-500">Zona waktu: <span x-text="tz"></span>. Pastikan waktu sesuai.</p>
                            <p x-show="touched.when && !validWhen" class="mt-1 text-xs text-red-600">Tanggal & waktu tidak valid atau sudah lewat.</p>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">Metode</label>
                            <div class="flex gap-2">
                                <button type="button" @click="method='meet'" class="px-3 py-1.5 rounded-full text-sm border transition" :class="method==='meet' ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white text-neutral-700 border-neutral-300'">Google Meet</button>
                                <button type="button" @click="method='wa'" class="px-3 py-1.5 rounded-full text-sm border transition" :class="method==='wa' ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white text-neutral-700 border-neutral-300'">WhatsApp</button>
                            </div>
                        </div>
                        <div x-show="method==='meet'" x-transition>
                            <label class="block text-sm mb-1">Link Google Meet (opsional)</label>
                            <input x-model="link" @blur="touched.link=true" type="url" placeholder="https://meet.google.com/..." class="w-full rounded-lg border px-3 py-2" :class="(!validLink && touched.link) ? 'border-red-400 focus:ring-red-200 focus:border-red-400' : 'border-neutral-300'">
                            <p x-show="touched.link && !validLink" class="mt-1 text-xs text-red-600">Link Meet tidak valid. Gunakan format https://meet.google.com/xxx-xxxx-xxx</p>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Topik</label>
                        <input x-model="topic" @blur="touched.topic=true" type="text" placeholder="Contoh: Diskusi scope landing page" class="w-full rounded-lg border px-3 py-2" :class="(touched.topic && !topicValid) ? 'border-red-400 focus:ring-red-200 focus:border-red-400' : 'border-neutral-300'" required>
                        <p x-show="touched.topic && !topicValid" class="mt-1 text-xs text-red-500">Tuliskan topik minimal 5 karakter.</p>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <label class="inline-flex items-center gap-2 text-xs text-neutral-600 select-none">
                                <input type="checkbox" x-model="remember" class="rounded border-neutral-300">
                                Ingat isian ini
                            </label>
                            <button type="button" @click="resetAll()" class="text-xs underline text-neutral-500 hover:text-neutral-700">Reset</button>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="text-xs text-neutral-500">WA tujuan: +<span x-text="wa"></span></div>
                            <button type="submit" :disabled="!formValid || submitting" :class="(!formValid || submitting)?'opacity-60 cursor-not-allowed':''" class="px-5 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-500 transition flex items-center gap-2">
                                <svg x-show="submitting" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke-width="4"></circle>
                                    <path class="opacity-75" stroke-width="4" d="M4 12a8 8 0 018-8" stroke-linecap="round"></path>
                                </svg>
                                <span x-text="submitting ? 'Mengirim...' : 'Kirim ke WhatsApp'"></span>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="relative z-0 rounded-2xl border border-neutral-200 p-6 bg-white scheduler-shell" data-reveal>
                    <div class="text-sm preview-title">Pratinjau Pesan</div>
                    <div class="mt-2 rounded-lg p-4 text-sm whitespace-pre-line preview-text" x-text="decodeURIComponent(msg.replaceAll('%0A','\n'))"></div>
                    <div class="mt-6">
                        <div class="text-xs preview-title">Tips</div>
                        <ul class="mt-2 text-sm text-neutral-700 list-disc pl-5 space-y-1">
                            <li>Pastikan tanggal & waktu sesuai zona waktu perangkat Anda.</li>
                            <li>Pilih WhatsApp jika ingin melakukan panggilan langsung.</li>
                            <li>Jika punya link Meet sendiri, tempelkan pada kolom opsional.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div x-show="toast" x-transition class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50">
                <div class="rounded-full bg-neutral-900 text-white px-4 py-2 text-sm shadow-lg">{{ __('Terkirim. Lanjutkan di WhatsApp.') }}</div>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-2 gap-8">
            <div>
                <h2 class="text-2xl font-bold">Konsultasi Proyek</h2>
                <p class="mt-2 text-neutral-600">Ceritakan ide atau kebutuhan Anda, kami siap membantu dari perencanaan hingga eksekusi.</p>
                <ul class="mt-6 space-y-2 text-sm text-neutral-700">
                    @forelse(($contacts ?? []) as $c)
                        <li>{{ $c->label ?? ucfirst($c->type) }}: {{ $c->value }}</li>
                    @empty
                        <li>Email: engineertekno@gmail.com</li>
                        <li>WhatsApp: 6285156553226</li>
                    @endforelse
                </ul>
            </div>
            <form x-data="{name:'',email:'',msg:'',sent:false}" @submit.prevent="sent=true" class="rounded-xl border border-neutral-200 p-6 bg-white">
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm mb-1">Nama</label>
                        <input x-model="name" type="text" class="w-full rounded-lg border border-neutral-300 px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Email</label>
                        <input x-model="email" type="email" class="w-full rounded-lg border border-neutral-300 px-3 py-2" required>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm mb-1">Pesan</label>
                    <textarea x-model="msg" rows="4" class="w-full rounded-lg border border-neutral-300 px-3 py-2" required></textarea>
                </div>
                <button type="submit" :disabled="!name||!email||!msg" :class="(!name||!email||!msg) ? 'opacity-50 cursor-not-allowed' : ''" class="mt-4 px-4 py-2 rounded-lg bg-neutral-900 text-white transition active:scale-[0.98]">Kirim</button>
                <p x-show="sent" x-transition class="mt-3 text-sm text-green-600">Terima kasih! Pesan Anda telah terekam (demo).</p>
            </form>
        </div>
    </section>

    <script>
        function tiltCard() {
            return {
                rotationX: 0,
                rotationY: 0,
                cardStyle: 'transform: rotateX(0deg) rotateY(0deg);',
                move(event) {
                    const bounds = event.currentTarget.getBoundingClientRect();
                    const centerX = bounds.left + bounds.width / 2;
                    const centerY = bounds.top + bounds.height / 2;
                    const maxTilt = 12;
                    const percentX = (event.clientX - centerX) / (bounds.width / 2);
                    const percentY = (event.clientY - centerY) / (bounds.height / 2);
                    this.rotationY = Math.max(-maxTilt, Math.min(maxTilt, percentX * maxTilt));
                    this.rotationX = Math.max(-maxTilt, Math.min(maxTilt, -percentY * maxTilt));
                    this.updateStyle();
                },
                reset() {
                    this.rotationX = 0;
                    this.rotationY = 0;
                    this.updateStyle();
                },
                updateStyle() {
                    this.cardStyle = `transform: rotateX(${this.rotationX}deg) rotateY(${this.rotationY}deg);`;
                }
            };
        }

        function microTypewriter(lines = []) {
            return {
                lines: Array.isArray(lines) ? lines : [],
                index: 0,
                display: '',
                typing: null,
                pausing: null,
                init() {
                    if (!this.lines.length) return;
                    this.typeLine();
                },
                nextLine() {
                    this.index = (this.index + 1) % this.lines.length;
                    this.typeLine();
                },
                typeLine() {
                    clearTimeout(this.typing);
                    clearTimeout(this.pausing);
                    const text = this.lines[this.index] || '';
                    const step = (pos) => {
                        if (pos <= text.length) {
                            this.display = text.slice(0, pos);
                            this.typing = setTimeout(() => step(pos + 1), 30);
                        } else {
                            this.pausing = setTimeout(() => this.erase(text.length), 1800);
                        }
                    };
                    step(0);
                },
                erase(pos) {
                    clearTimeout(this.typing);
                    if (pos >= 0) {
                        const text = (this.lines[this.index] || '').slice(0, pos);
                        this.display = text;
                        this.typing = setTimeout(() => this.erase(pos - 1), 20);
                    } else {
                        this.nextLine();
                    }
                }
            };
        }

        function statCounter({ start = 0, end = 0, duration = 900, suffix = '' } = {}) {
            return {
                value: start,
                end,
                suffix,
                duration,
                animate: false,
                start() {
                    const range = this.end - this.value;
                    const steps = Math.max(1, Math.round(this.duration / 30));
                    const increment = range / steps;
                    let currentStep = 0;
                    const tick = () => {
                        currentStep++;
                        this.value += increment;
                        if (currentStep < steps) {
                            requestAnimationFrame(tick);
                        } else {
                            this.value = this.end;
                        }
                    };
                    this.animate = true;
                    requestAnimationFrame(tick);
                },
                formatted() {
                    const number = Math.round(this.value);
                    return `${number}${this.suffix}`;
                }
            };
        }

        function heroTheme() {
            return {
                theme: 'day',
                particles: [],
                particleCount: window.innerWidth < 768 ? 12 : 24,
                init() {
                    const saved = localStorage.getItem('heroTheme');
                    if (saved === 'night' || saved === 'day') {
                        this.theme = saved;
                    }
                    this.applyTheme();
                    this.generateParticles();
                    window.addEventListener('resize', this.handleResize.bind(this));
                },
                toggle() {
                    this.theme = this.theme === 'night' ? 'day' : 'night';
                    localStorage.setItem('heroTheme', this.theme);
                    this.applyTheme();
                },
                handleResize() {
                    this.particleCount = window.innerWidth < 768 ? 12 : 24;
                    this.generateParticles();
                },
                generateParticles() {
                    const arr = [];
                    for (let i = 0; i < this.particleCount; i++) {
                        arr.push({
                            id: i,
                            top: Math.random() * 100,
                            left: Math.random() * 100,
                            delay: Math.random() * 6,
                            duration: 6 + Math.random() * 6,
                            size: 2 + Math.random() * 4,
                            blur: Math.random() * 4,
                        });
                    }
                    this.particles = arr;
                },
                particleStyle(p) {
                    return {
                        top: `${p.top}%`,
                        left: `${p.left}%`,
                        width: `${p.size}px`,
                        height: `${p.size}px`,
                        filter: `blur(${p.blur}px)`,
                        animationDelay: `${p.delay}s`,
                        animationDuration: `${p.duration}s`
                    };
                },
                applyTheme() {
                    document.body.classList.toggle('theme-night', this.theme === 'night');
                }
            };
        }

        function testimonialCarousel(initial = []) {
            return {
                items: Array.isArray(initial) ? initial : [],
                index: 0,
                progress: 0,
                duration: 5200,
                timer: null,
                progressRaf: null,
                sx: 0,
                dx: 0,
                parallaxRefs: {},
                handleScroll: null,
                parallaxStyles: {},
                init() {
                    this.handleScroll = () => this.parallaxTick();
                    window.addEventListener('scroll', this.handleScroll, { passive: true });
                    if (this.items.length > 0) {
                        this.resume();
                        this.parallaxTick();
                    }
                },
                destroy() {
                    this.stop();
                    if (this.handleScroll) {
                        window.removeEventListener('scroll', this.handleScroll);
                    }
                },
                start() {
                    this.resume();
                },
                resume() {
                    if (this.items.length <= 1) {
                        this.progress = 0;
                        return;
                    }
                    if (this.timer) return;
                    this.progress = 0;
                    this.startProgressLoop();
                    this.timer = setInterval(() => this.next(), this.duration);
                },
                stop() {
                    if (this.timer) {
                        clearInterval(this.timer);
                        this.timer = null;
                    }
                    if (this.progressRaf) {
                        cancelAnimationFrame(this.progressRaf);
                        this.progressRaf = null;
                    }
                },
                startProgressLoop() {
                    if (this.progressRaf) {
                        cancelAnimationFrame(this.progressRaf);
                        this.progressRaf = null;
                    }
                    let last = performance.now();
                    const tick = (now) => {
                        if (!this.timer) {
                            this.progressRaf = null;
                            return;
                        }
                        const delta = now - last;
                        last = now;
                        this.progress = (this.progress + (delta / this.duration) * 100) % 100;
                        this.progressRaf = requestAnimationFrame(tick);
                    };
                    this.progressRaf = requestAnimationFrame(tick);
                },
                next() {
                    if (!this.items.length) return;
                    this.index = (this.index + 1) % this.items.length;
                    this.resetCycle();
                },
                prev() {
                    if (!this.items.length) return;
                    this.index = (this.index - 1 + this.items.length) % this.items.length;
                    this.resetCycle();
                },
                go(idx) {
                    if (!this.items.length) return;
                    const target = Math.max(0, Math.min(this.items.length - 1, idx));
                    this.index = target;
                    this.resetCycle();
                },
                resetCycle() {
                    this.stop();
                    this.progress = 0;
                    this.resume();
                    this.$nextTick(() => this.parallaxTick());
                },
                observe(el) {
                    if (!el) return;
                    const idx = Number(el.dataset.index);
                    if (Number.isNaN(idx)) return;
                    this.parallaxRefs[idx] = el;
                    this.applyParallax(el);
                },
                titleStyle(idx) {
                    const style = this.parallaxStyles[idx];
                    const val = style ? style.title : 0;
                    return `transform: translateY(${val}px);`;
                },
                quoteStyle(idx) {
                    const style = this.parallaxStyles[idx];
                    const val = style ? style.quote : 0;
                    return `transform: translateY(${val}px);`;
                },
                parallaxTick() {
                    Object.values(this.parallaxRefs).forEach((el) => this.applyParallax(el));
                },
                applyParallax(el) {
                    if (!el) return;
                    const idx = Number(el.dataset.index);
                    if (Number.isNaN(idx)) return;
                    const rect = el.getBoundingClientRect();
                    const vh = window.innerHeight || 1;
                    const center = rect.top + rect.height / 2;
                    const offset = ((center / vh) - 0.5) * 2; // -1 .. 1
                    const clamp = Math.max(-1, Math.min(1, offset));
                    const titleOffset = clamp * -12;
                    const quoteOffset = clamp * -24;
                    this.parallaxStyles[idx] = { title: titleOffset, quote: quoteOffset };
                }
            };
        }

        function techCarousel() {
            return {
                inner: null,
                track: null,
                timer: null,
                delay: 3400,
                index: 0,
                total: 0,
                slidesCount: 0,
                offsets: [],
                init() {
                    this.inner = this.$refs.inner;
                    this.track = this.$refs.track;
                    this.remeasure();
                    window.addEventListener('resize', () => this.remeasure());
                    if (this.slidesCount > 1) {
                        this.resume();
                    }
                },
                refreshTotal() {
                    this.total = this.inner ? this.inner.querySelectorAll('.tech-card').length : 0;
                },
                remeasure() {
                    this.refreshTotal();
                    if (!this.inner) {
                        this.slidesCount = 0;
                        this.offsets = [];
                        return;
                    }
                    const slides = Array.from(this.inner.querySelectorAll('.tech-slide'));
                    this.slidesCount = slides.length;
                    this.offsets = slides.map(slide => slide.offsetLeft);
                    if (this.index >= this.slidesCount) {
                        this.index = this.slidesCount > 0 ? this.slidesCount - 1 : 0;
                    }
                    if (this.slidesCount <= 1) {
                        this.pause();
                    }
                },
                pages() {
                    return Array.from({ length: this.slidesCount || 1 }, (_, i) => i);
                },
                scroll(direction) {
                    this.remeasure();
                    if (this.slidesCount <= 1) return;
                    let next = this.index + direction;
                    if (next >= this.slidesCount) next = 0;
                    if (next < 0) next = this.slidesCount - 1;
                    this.go(next);
                },
                go(idx) {
                    if (!this.inner) return;
                    this.remeasure();
                    if (this.slidesCount <= 1) return;
                    idx = Math.max(0, Math.min(this.slidesCount - 1, idx));
                    const target = this.offsets[idx] ?? ((this.track?.clientWidth || this.inner.clientWidth || 1) * idx);
                    this.index = idx;
                    this.inner.scrollTo({ left: target, behavior: 'smooth' });
                    this.restart();
                },
                onScroll() {
                    if (!this.inner || this.slidesCount <= 1) return;
                    const scrollLeft = this.inner.scrollLeft;
                    let nearest = 0;
                    let minDiff = Infinity;
                    this.offsets.forEach((offset, i) => {
                        const diff = Math.abs(scrollLeft - offset);
                        if (diff < minDiff) {
                            minDiff = diff;
                            nearest = i;
                        }
                    });
                    this.index = nearest;
                },
                pause() {
                    if (this.timer) {
                        clearInterval(this.timer);
                        this.timer = null;
                    }
                },
                resume() {
                    this.pause();
                    if (this.slidesCount <= 1) return;
                    this.timer = setInterval(() => this.scroll(1), this.delay);
                },
                restart() {
                    this.resume();
                }
            };
        }

        function typewriterCard() {
            return {
                items: [
                    {
                        label: 'Tugas Kuliah',
                        title: 'Tugas Kuliah Cepat & Rapi',
                        tagline: 'COLLEGE PROJECT',
                        emoji: '📚',
                        accent: '#6366F1',
                        subtitle: 'Landing page, tugas praktikum, atau mini app yang siap demo dalam hitungan hari.',
                        bullets: [
                            'Landing page / CRUD sederhana dengan dokumentasi singkat',
                            'Update harian untuk memantau progress deadline mepet',
                            'Revisi sewajarnya sampai siap presentasi'
                        ],
                        sentences: [
                            'Slicing desain + integrasi database jadi mudah.',
                            'Progress harian dibagikan lewat Trello atau WhatsApp.',
                            'Live preview disiapkan untuk latihan demo.'
                        ]
                    },
                    {
                        label: 'Modifikasi',
                        title: 'Modifikasi & Optimalisasi',
                        tagline: 'IMPROVEMENT',
                        emoji: '🛠️',
                        accent: '#8B5CF6',
                        subtitle: 'Refactor fitur lama supaya performa meningkat dan UI terasa baru.',
                        bullets: [
                            'Redesign halaman utama agar lebih konversi',
                            'Integrasi API atau fitur tambahan sesuai scope',
                            'Audit performa, aksesibilitas, dan SEO dasar'
                        ],
                        sentences: [
                            'Refactor legacy code jadi standar Laravel modern.',
                            'Tambah integrasi API dan automate proses bisnis.',
                            'Optimasi skor Lighthouse biar makin ngebut.'
                        ]
                    },
                    {
                        label: 'Dari Nol',
                        title: 'Bangun Website dari Nol',
                        tagline: 'FULL BUILD',
                        emoji: '🚀',
                        accent: '#10B981',
                        subtitle: 'Mulai dari wireframe, hingga launching dengan dukungan pasca deploy.',
                        bullets: [
                            'Desain responsif & brand guide sederhana',
                            'Setup deployment + training singkat',
                            'Roadmap pengembangan fitur lanjutan'
                        ],
                        sentences: [
                            'Brainstorm kebutuhan dan scope dalam workshop 1 jam.',
                            'Delivery modul bertahap agar mudah review.',
                            'Support pasca go-live untuk jaga stabilitas.'
                        ]
                    }
                ],
                index: 0,
                displayText: '',
                caretVisible: true,
                typing: null,
                pausing: null,
                caretTimer: null,
                sentenceIndex: 0,
                currentSentence: '',
                get current() {
                    return this.items[this.index];
                },
                init() {
                    this.startTyping();
                    this.caretTimer = setInterval(() => {
                        this.caretVisible = !this.caretVisible;
                    }, 500);
                },
                destroy() {
                    clearInterval(this.caretTimer);
                    clearTimeout(this.typing);
                    clearTimeout(this.pausing);
                },
                startTyping() {
                    if (!this.current) return;
                    const sentences = this.current.sentences;
                    if (!sentences || sentences.length === 0) return;
                    this.currentSentence = sentences[this.sentenceIndex % sentences.length];
                    this.typeOut(0);
                },
                typeOut(pos) {
                    const text = this.currentSentence;
                    if (pos <= text.length) {
                        this.displayText = text.slice(0, pos);
                        this.typing = setTimeout(() => this.typeOut(pos + 1), 45);
                    } else {
                        this.pausing = setTimeout(() => this.erase(text.length), 2200);
                    }
                },
                erase(pos) {
                    if (pos >= 0) {
                        this.displayText = this.currentSentence.slice(0, pos);
                        this.typing = setTimeout(() => this.erase(pos - 1), 30);
                    } else {
                        this.sentenceIndex = (this.sentenceIndex + 1) % (this.current.sentences?.length || 1);
                        this.pausing = setTimeout(() => this.startTyping(), 200);
                    }
                },
                select(idx) {
                    if (idx === this.index) return;
                    this.index = idx;
                    this.resetTyping();
                },
                prev() {
                    this.index = (this.index - 1 + this.items.length) % this.items.length;
                    this.resetTyping();
                },
                next() {
                    this.index = (this.index + 1) % this.items.length;
                    this.resetTyping();
                },
                resetTyping() {
                    clearTimeout(this.typing);
                    clearTimeout(this.pausing);
                    this.displayText = '';
                    this.sentenceIndex = 0;
                    this.startTyping();
                },
                bullets() {
                    return [];
                }
            };
        }
    </script>

@endsection
