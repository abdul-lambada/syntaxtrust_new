<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login • Admin {{ optional(\App\Models\SiteSetting::where('is_active',true)->latest('id')->first())->site_name ?? 'SyntaxTrust' }}</title>
    @php($__setting = \App\Models\SiteSetting::where('is_active',true)->latest('id')->first())
    @php($__favicon = $__setting && $__setting->logo_path ? (\Illuminate\Support\Str::startsWith($__setting->logo_path, ['http://','https://','/']) ? $__setting->logo_path : \Illuminate\Support\Facades\Storage::url($__setting->logo_path)) : asset('template/dist/assets/images/favicon.png'))
    <link rel="icon" href="{{ $__favicon }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/style.css') }}">
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo text-center mb-3">
                            @php($__s = \App\Models\SiteSetting::where('is_active',true)->latest('id')->first())
                            @php($__logo = $__s && $__s->logo_path ? (\Illuminate\Support\Str::startsWith($__s->logo_path,['http://','https://','/']) ? $__s->logo_path : \Illuminate\Support\Facades\Storage::url($__s->logo_path)) : asset('template/dist/assets/images/logo.svg'))
                            <img src="{{ $__logo }}" alt="logo" style="height:40px">
                        </div>
                        <h4>Halo! Selamat datang kembali</h4>
                        <h6 class="fw-light">Silakan masuk ke akun admin.</h6>
                        <form method="POST" action="{{ route('admin.login.post') }}" class="pt-3">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" id="email" placeholder="Email" required autofocus>
                                @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" required>
                            </div>
                            <div class="mt-3 d-grid">
                                <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">Masuk</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" name="remember"> Ingat saya </label>
                                </div>
                                <a href="#" class="auth-link text-black">Lupa password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('template/dist/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('template/dist/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('template/dist/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('template/dist/assets/js/template.js') }}"></script>
</body>
</html>
