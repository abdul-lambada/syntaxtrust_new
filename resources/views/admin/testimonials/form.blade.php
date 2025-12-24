@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->exists ? 'Edit Testimoni' : 'Tambah Testimoni' }}</h4>
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ $item->exists ? route('admin.testimonials.update', $item) : route('admin.testimonials.store') }}">
                        @csrf
                        @if ($item->exists)
                            @method('PUT')
                        @endif
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" name="author_name"
                                    value="{{ old('author_name', $item->author_name) }}" class="form-control" required>
                                @error('author_name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Peran</label>
                                <input type="text" name="author_role"
                                    value="{{ old('author_role', $item->author_role) }}" class="form-control">
                                @error('author_role')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Avatar (Photo)</label>
                                <input type="file" name="avatar_file" class="form-control" accept="image/*">
                                @error('avatar_file')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Maksimal 2MB. Rekomendasi 1:1.</div>

                                @if ($item->avatar)
                                    <div class="mt-2">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($item->avatar) }}"
                                            alt="avatar" style="height:56px; width:56px; object-fit:cover;"
                                            class="rounded-circle border">
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Rating</label>
                                <input type="number" name="rating" value="{{ old('rating', $item->rating) }}"
                                    class="form-control" min="1" max="5">
                                @error('rating')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Urutan</label>
                                <input type="number" name="order" value="{{ old('order', $item->order) }}"
                                    class="form-control" min="0">
                                @error('order')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Isi</label>
                                <textarea name="content" rows="4" class="form-control" required>{{ old('content', $item->content) }}</textarea>
                                @error('content')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="is_active" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active"> Aktif </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
