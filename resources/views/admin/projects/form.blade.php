@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">{{ $project->exists ? 'Edit Project' : 'Tambah Project' }}</h4>

                    <form method="POST" enctype="multipart/form-data"
                        action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}">
                        @csrf
                        @if ($project->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Judul Project</label>
                                <input type="text" name="title" value="{{ old('title', $project->title) }}"
                                    class="form-control" required placeholder="E.g. E-Learning Platform">
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Slug (opsional)</label>
                                <input type="text" name="slug" value="{{ old('slug', $project->slug) }}"
                                    class="form-control" placeholder="E.g. e-learning-platform">
                                @error('slug')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kategori</label>
                                <input type="text" name="category" value="{{ old('category', $project->category) }}"
                                    class="form-control" placeholder="E.g. Web App, Mobile, UI/UX">
                                @error('category')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nama Klien (opsional)</label>
                                <input type="text" name="client_name"
                                    value="{{ old('client_name', $project->client_name) }}" class="form-control"
                                    placeholder="E.g. PT. Maju Bersama">
                                @error('client_name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="description" rows="4" class="form-control" placeholder="Jelaskan detail project...">{{ old('description', $project->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Project Link (URL)</label>
                                <input type="url" name="link" value="{{ old('link', $project->link) }}"
                                    class="form-control" placeholder="https://example.com">
                                @error('link')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Urutan</label>
                                <input type="number" name="order" value="{{ old('order', $project->order ?? 0) }}"
                                    class="form-control" min="0">
                                @error('order')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gambar/Thumbnail</label>
                                <input type="file" name="image_file" class="form-control" accept="image/*">
                                @error('image_file')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Rekomendasi rasio 16:9 atau 4:3. Max 3MB.</div>

                                @if ($project->image)
                                    <div class="mt-2 text-center border p-2 rounded bg-light">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($project->image) }}"
                                            alt="current" style="max-height:150px; max-width:100%;">
                                        <div class="form-check mt-2 d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" name="remove_image"
                                                id="remove_image" value="1">
                                            <label class="form-check-label ms-1" for="remove_image">Hapus gambar
                                                lama</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="is_active"
                                        {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active"> Tampilkan di Landing Page </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
