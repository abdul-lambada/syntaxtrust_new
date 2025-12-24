@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                                aria-controls="overview" aria-selected="true">Ringkasan</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="statistics-details d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="statistics-title">Portofolio</p>
                                        <h3 class="rate-percentage">{{ $stats['projects'] }}</h3>
                                        <p class="text-success d-flex"><span>Total Project</span></p>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Layanan</p>
                                        <h3 class="rate-percentage">{{ $stats['services'] }}</h3>
                                        <p class="text-primary d-flex"><span>Kategori Jasa</span></p>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Testimoni</p>
                                        <h3 class="rate-percentage">{{ $stats['testimonials'] }}</h3>
                                        <p class="text-info d-flex"><span>Ulasan Klien</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Permintaan Jadwal</p>
                                        <h3 class="rate-percentage">{{ $stats['meetings'] }}</h3>
                                        <p class="text-warning d-flex"><span>Pertemuan</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Teknologi</p>
                                        <h3 class="rate-percentage">{{ $stats['technologies'] }}</h3>
                                        <p class="text-secondary d-flex"><span>Stack</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 d-flex flex-column">
                                <div class="row grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Permintaan Jadwal Terbaru
                                                        </h4>
                                                        <p class="card-subtitle card-subtitle-dash">Daftar klien yang ingin
                                                            berkonsultasi</p>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('admin.meeting-requests.index') }}"
                                                            class="btn btn-primary btn-lg text-white mb-0 me-0">Lihat
                                                            Semua</a>
                                                    </div>
                                                </div>
                                                <div class="table-responsive mt-1">
                                                    <table class="table select-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Klien</th>
                                                                <th>Metode</th>
                                                                <th>Waktu</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($recent_meetings as $m)
                                                                <tr>
                                                                    <td>
                                                                        <h6>{{ $m->name }}</h6>
                                                                        <p>{{ Str::limit($m->topic, 30) }}</p>
                                                                    </td>
                                                                    <td>
                                                                        <div class="badge badge-opacity-info">
                                                                            {{ strtoupper($m->method) }}</div>
                                                                    </td>
                                                                    <td>{{ $m->when_at }}</td>
                                                                    <td>
                                                                        <div class="badge badge-opacity-warning">
                                                                            {{ $m->status }}</div>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="4" class="text-center text-muted">Belum
                                                                        ada permintaan</td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column">
                                <div class="row grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <h4 class="card-title card-title-dash">Proyek Per Kategori</h4>
                                                        </div>
                                                        @if ($project_categories->count() > 0)
                                                            <canvas class="my-auto" id="projectChart"
                                                                height="200"></canvas>
                                                            <div id="projectChart-legend" class="mt-4 text-center"></div>
                                                        @else
                                                            <div class="d-flex align-items-center justify-content-center"
                                                                style="height: 200px;">
                                                                <div class="text-center">
                                                                    <i class="mdi mdi-chart-donut text-muted d-block mb-2"
                                                                        style="font-size: 2rem;"></i>
                                                                    <p class="text-muted small">Belum ada data proyek</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <h4 class="card-title card-title-dash">Portofolio Baru</h4>
                                                <div class="feed-element-wrapper mt-3">
                                                    @foreach ($recent_projects as $p)
                                                        <div class="d-flex align-items-center border-bottom py-3">
                                                            @if ($p->image)
                                                                <img class="img-sm rounded-1 me-3"
                                                                    src="{{ Storage::url($p->image) }}" alt="project">
                                                            @else
                                                                <div
                                                                    class="img-sm rounded-1 me-3 bg-neutral-200 d-flex align-items-center justify-content-center">
                                                                    <i class="mdi mdi-folder-outline"></i>
                                                                </div>
                                                            @endif
                                                            <div class="wrapper w-100">
                                                                <p class="mb-0">
                                                                    <a href="{{ route('admin.projects.edit', $p) }}"
                                                                        class="fw-bold text-dark">{{ $p->title }}</a>
                                                                </p>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <i class="mdi mdi-tag-outline text-muted me-1"></i>
                                                                        <p class="mb-0 text-small text-muted">
                                                                            {{ $p->category }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a href="{{ route('admin.projects.index') }}"
                                                    class="btn btn-outline-primary btn-sm d-block mt-3">Semua Portofolio</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_js')
    <script src="{{ asset('template/dist/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script>
        (function($) {
            'use strict';
            if ($("#projectChart").length) {
                var projectData = {
                    datasets: [{
                        data: {!! json_encode($project_categories->pluck('total')) !!},
                        backgroundColor: [
                            "#1F3BB3",
                            "#F1533E",
                            "#FECD01",
                            "#484848",
                            "#8D62AB",
                            "#52CDFF"
                        ],
                        borderColor: [
                            "#fff",
                            "#fff",
                            "#fff",
                            "#fff",
                            "#fff",
                            "#fff"
                        ],
                        borderWidth: 2
                    }],
                    labels: {!! json_encode($project_categories->pluck('category_name')) !!}
                };
                var projectOptions = {
                    cutout: 70,
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                };
                var projectCanvas = $("#projectChart").get(0).getContext("2d");
                var projectChart = new Chart(projectCanvas, {
                    type: 'doughnut',
                    data: projectData,
                    options: projectOptions,
                    plugins: [{
                        afterDatasetUpdate: function(chart, args, options) {
                            const chartId = chart.canvas.id;
                            const legendId = `${chartId}-legend`;
                            const legendElem = document.getElementById(legendId);
                            if (!legendElem) return;

                            legendElem.innerHTML = '';
                            const ul = document.createElement('ul');
                            ul.style.listStyle = 'none';
                            ul.style.padding = '0';
                            ul.style.display = 'flex';
                            ul.style.flexWrap = 'wrap';
                            ul.style.justifyContent = 'center';
                            ul.style.gap = '10px';

                            for (let i = 0; i < chart.data.datasets[0].data.length; i++) {
                                const li = document.createElement('li');
                                li.style.fontSize = '12px';
                                li.style.color = '#6B778C';
                                li.style.display = 'flex';
                                li.style.alignItems = 'center';

                                const span = document.createElement('span');
                                span.style.backgroundColor = chart.data.datasets[0].backgroundColor[
                                    i];
                                span.style.width = '12px';
                                span.style.height = '12px';
                                span.style.borderRadius = '50%';
                                span.style.display = 'inline-block';
                                span.style.marginRight = '5px';

                                li.appendChild(span);
                                li.appendChild(document.createTextNode(chart.data.labels[i]));
                                ul.appendChild(li);
                            }
                            legendElem.appendChild(ul);
                        }
                    }]
                });
            }
        })(jQuery);
    </script>
@endpush
