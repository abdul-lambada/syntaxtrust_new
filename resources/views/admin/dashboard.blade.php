@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title">Dashboard</h4>
                <p class="card-description">Selamat datang di panel admin SyntaxTrust.</p>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-2">Services</h6>
                                <p class="text-muted mb-0">Kelola layanan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-2">Timeline</h6>
                                <p class="text-muted mb-0">Kelola tahapan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-2">Testimoni</h6>
                                <p class="text-muted mb-0">Kelola ulasan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-2">Meeting</h6>
                                <p class="text-muted mb-0">Permintaan jadwal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
