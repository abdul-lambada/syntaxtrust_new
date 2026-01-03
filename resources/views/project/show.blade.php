@extends('layouts.app')

@section('content')
    <div class="relative pt-24 pb-16 lg:pt-32 lg:pb-24 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] bg-size-[24px_24px] opacity-30"></div>
        <div class="absolute top-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-neutral-200 to-transparent"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-neutral-500 hover:text-indigo-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-neutral-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-neutral-400 md:ml-2">Portofolio Detail</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">
                <!-- Left Column: Content -->
                <div class="space-y-8">
                    <div>
                        <span
                            class="inline-block px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-bold tracking-wider uppercase mb-4 border border-indigo-100">
                            {{ $project->category ?? 'Jasa Website' }}
                        </span>
                        <h1 class="text-4xl lg:text-5xl font-extrabold text-neutral-900 tracking-tight leading-tight mb-4">
                            {{ $project->title }}
                        </h1>
                        @if ($project->client_name)
                            <p class="text-lg text-neutral-500 font-medium border-l-4 border-indigo-500 pl-4">
                                Client: {{ $project->client_name }}
                            </p>
                        @endif
                    </div>

                    <div class="prose prose-lg prose-indigo text-neutral-600 leading-relaxed">
                        {!! nl2br(e($project->description)) !!}
                    </div>

                    @if ($project->link)
                        <div class="pt-4">
                            <a href="{{ $project->link }}" target="_blank"
                                class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white transition-all duration-200 bg-indigo-600 border border-transparent rounded-xl hover:bg-indigo-700 hover:-translate-y-1 shadow-lg shadow-indigo-200 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                Kunjungi Website
                                <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Right Column: Image with Frame -->
                <div class="relative group" data-reveal>
                    <div
                        class="absolute -inset-4 bg-linear-to-r from-indigo-500 to-violet-500 rounded-[2.5rem] opacity-20 blur-2xl group-hover:opacity-30 transition-opacity duration-500">
                    </div>
                    <div class="relative rounded-4xl overflow-hidden border border-neutral-200 shadow-2xl bg-white">
                        <!-- Mac Browser Header -->
                        <div class="h-8 bg-neutral-100 flex items-center px-4 border-b border-neutral-200">
                            <div class="flex space-x-1.5">
                                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                                <div class="w-3 h-3 rounded-full bg-green-400"></div>
                            </div>
                        </div>
                        <img src="{{ $project->image ? \Illuminate\Support\Facades\Storage::url($project->image) : \Illuminate\Support\Facades\Storage::url('projects/default.png') }}"
                            onerror="this.onerror=null;this.src='{{ \Illuminate\Support\Facades\Storage::url('projects/default.png') }}';"
                            alt="{{ $project->title }}"
                            class="w-full h-auto object-cover transform transition duration-700 group-hover:scale-105">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Projects Section -->
    @if ($otherProjects->count() > 0)
        <section class="py-24 bg-white relative overflow-hidden">
            <!-- Background Blurs -->
            <div class="absolute -top-24 -right-24 h-96 w-96 bg-indigo-50 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute -bottom-24 -left-24 h-96 w-96 bg-violet-50 rounded-full blur-3xl opacity-50"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-neutral-900 tracking-tight mb-4">
                        Project Lainnya
                    </h2>
                    <p class="text-lg text-neutral-500">
                        Lihat hasil karya kami yang lain
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($otherProjects as $other)
                        <a href="{{ route('project.show', $other->slug) }}"
                            class="group block relative rounded-4xl overflow-hidden bg-white border border-neutral-100 shadow-lg hover:shadow-xl transition-all hover:-translate-y-2">
                            <div class="aspect-4/3 overflow-hidden bg-neutral-100 relative">
                                <img src="{{ $other->image ? \Illuminate\Support\Facades\Storage::url($other->image) : \Illuminate\Support\Facades\Storage::url('projects/default.png') }}"
                                    onerror="this.onerror=null;this.src='{{ \Illuminate\Support\Facades\Storage::url('projects/default.png') }}';"
                                    alt="{{ $other->title }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity">
                                </div>

                                <div
                                    class="absolute bottom-0 left-0 right-0 p-6 translate-y-2 group-hover:translate-y-0 transition-transform">
                                    <span
                                        class="text-xs font-bold text-indigo-300 uppercase tracking-wider mb-2 block">{{ $other->category }}</span>
                                    <h3 class="text-xl font-bold text-white mb-1">{{ $other->title }}</h3>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    <a href="/"
                        class="inline-flex items-center text-indigo-600 font-bold hover:text-indigo-700 transition">
                        <svg class="w-5 h-5 mr-2 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </section>
    @endif
@endsection
