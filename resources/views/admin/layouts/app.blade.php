<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin • SyntaxTrust</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/dist/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/dist/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- Plugin css for this page -->
    <link rel="stylesheet"
        href="{{ asset('template/dist/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/dist/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    @stack('page_css')
    <!-- main theme css -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/style.css') }}">
    @php($__setting = \App\Models\SiteSetting::where('is_active', true)->latest('id')->first())
    @php($__favicon = $__setting && $__setting->logo_path ? (\Illuminate\Support\Str::startsWith($__setting->logo_path, ['http://', 'https://', '/']) ? $__setting->logo_path : \Illuminate\Support\Facades\Storage::url($__setting->logo_path)) : asset('template/dist/assets/images/favicon.png'))
    <link rel="icon" href="{{ $__favicon }}" />
    @stack('head')
</head>

<body class="with-welcome-text">
    <div class="container-scroller">
        <!-- navbar -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    @php($__setting = \App\Models\SiteSetting::where('is_active', true)->latest('id')->first())
                    @php($__logo = $__setting && $__setting->logo_path ? (\Illuminate\Support\Str::startsWith($__setting->logo_path, ['http://', 'https://', '/']) ? $__setting->logo_path : \Illuminate\Support\Facades\Storage::url($__setting->logo_path)) : null)
                    <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}">
                        <img src="{{ $__logo ?: asset('template/dist/assets/images/logo.svg') }}" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
                        <img src="{{ $__logo ?: asset('template/dist/assets/images/logo-mini.svg') }}"
                            alt="logo mini" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Halo, <span class="text-black fw-bold">{{ Auth::user()->name }}</span>
                        </h1>
                        <h3 class="welcome-sub-text">Ringkasan performa situs Anda minggu ini </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle"
                                src="{{ asset('template/dist/assets/images/faces/face8.jpg') }}" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <form method="POST" action="{{ route('admin.logout') }}" class="px-3">
                                @csrf
                                <button type="submit" class="btn btn-link text-start w-100 p-0"><i
                                        class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Keluar</button>
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Konten</li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.services.index') }}"><i
                                class="menu-icon mdi mdi-briefcase"></i><span class="menu-title">Layanan</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.projects.index') }}"><i
                                class="menu-icon mdi mdi-folder-multiple"></i><span
                                class="menu-title">Portofolio</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.pricing.index') }}"><i
                                class="menu-icon mdi mdi-cash-multiple"></i><span class="menu-title">Paket
                                Harga</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.timeline.index') }}"><i
                                class="menu-icon mdi mdi-timeline"></i><span class="menu-title">Tahapan</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.technologies.index') }}"><i
                                class="menu-icon fa fa-tasks"></i><span class="menu-title">Teknologi</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.process.index') }}"><i
                                class="menu-icon mdi mdi-clipboard-text"></i><span
                                class="menu-title">Proses</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimonials.index') }}"><i
                                class="menu-icon mdi mdi-comment-text"></i><span
                                class="menu-title">Testimoni</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.faqs.index') }}"><i
                                class="menu-icon mdi mdi-help-circle-outline"></i><span
                                class="menu-title">FAQ</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.contacts.index') }}"><i
                                class="menu-icon mdi mdi-account-box"></i><span class="menu-title">Kontak</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.promos.index') }}"><i
                                class="menu-icon mdi mdi-tag"></i><span class="menu-title">Promo</span></a></li>
                    <li class="nav-item nav-category">Pengaturan</li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.settings.index') }}"><i
                                class="menu-icon mdi mdi-cog"></i><span class="menu-title">Pengaturan Situs</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.meeting-requests.index') }}"><i
                                class="menu-icon mdi mdi-calendar"></i><span class="menu-title">Permintaan
                                Jadwal</span></a></li>
                </ul>
            </nav>

            <!-- main panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">
                            SyntaxTrust</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ asset('template/dist/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('template/dist/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('template/dist/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('template/dist/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('template/dist/assets/vendors/select2/select2.min.js') }}"></script>
    @stack('page_js')
    <!-- inject:js -->
    <script src="{{ asset('template/dist/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/template.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/settings.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    @stack('body')
</body>

</html>
