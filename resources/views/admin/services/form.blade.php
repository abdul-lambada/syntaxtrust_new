@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">{{ $service->exists ? 'Edit Service' : 'Tambah Service' }}</h4>

                    <form method="POST" enctype="multipart/form-data"
                        action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}">
                        @csrf
                        @if ($service->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Judul</label>
                                <input type="text" name="title" value="{{ old('title', $service->title) }}"
                                    class="form-control" required>
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Slug (opsional)</label>
                                <input type="text" name="slug" value="{{ old('slug', $service->slug) }}"
                                    class="form-control">
                                @error('slug')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Excerpt</label>
                                <input type="text" name="excerpt" value="{{ old('excerpt', $service->excerpt) }}"
                                    class="form-control">
                                @error('excerpt')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="description" rows="5" class="form-control">{{ old('description', $service->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Icon (Unggah Gambar)</label>
                                <input type="file" name="icon_file" class="form-control" accept="image/*">
                                @error('icon_file')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Maksimal 2MB.</div>

                                @if ($service->icon)
                                    <div class="mt-2 text-center border p-2 rounded bg-light">
                                        <img src="{{ \Illuminate\Support\Str::startsWith($service->icon, ['http://', 'https://', '/']) ? $service->icon : \Illuminate\Support\Facades\Storage::url($service->icon) }}"
                                            alt="icon" style="max-height:60px">
                                        <div class="form-check mt-2 d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" name="remove_icon"
                                                id="remove_icon" value="1">
                                            <label class="form-check-label ms-1" for="remove_icon">Hapus icon</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Urutan</label>
                                <input type="number" name="order" value="{{ old('order', $service->order) }}"
                                    class="form-control" min="0">
                                @error('order')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 d-flex align-items-center">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="is_active" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active"> Aktif </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
