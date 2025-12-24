@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->exists ? 'Edit Teknologi' : 'Tambah Teknologi' }}</h4>
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ $item->exists ? route('admin.technologies.update', $item) : route('admin.technologies.store') }}">
                        @csrf
                        @if ($item->exists)
                            @method('PUT')
                        @endif
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" value="{{ old('name', $item->name) }}"
                                    class="form-control" required>
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Slug (opsional)</label>
                                <input type="text" name="slug" value="{{ old('slug', $item->slug) }}"
                                    class="form-control">
                                @error('slug')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Icon Class (e.g. mdi mdi-code)</label>
                                <input type="text" name="icon" value="{{ old('icon', $item->icon) }}"
                                    class="form-control" placeholder="mdi mdi-language-php">
                                @error('icon')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror

                                <div class="mt-3">
                                    <label class="form-label">Atau Unggah Icon (Image)</label>
                                    <input type="file" name="icon_file" class="form-control" accept="image/*">
                                    @error('icon_file')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                    @if ($item->icon && \Illuminate\Support\Str::startsWith($item->icon, ['uploads/']))
                                        <div class="mt-2 border p-2 rounded bg-light d-inline-block">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($item->icon) }}"
                                                alt="current" style="height:40px">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Warna (hex)</label>
                                <div class="input-group" x-data="{ color: '{{ strtoupper(old('color', $item->color ?? '#FFFFFF')) }}' }" x-init="if (!color.startsWith('#')) color = '#' + color">
                                    <span class="input-group-text p-0">
                                        <input type="color" x-model="color"
                                            class="form-control form-control-color border-0" style="cursor:pointer">
                                    </span>
                                    <input type="text" name="color" x-model="color" class="form-control"
                                        placeholder="#FFFFFF" @input="if(!color.startsWith('#')) color = '#' + color">
                                </div>
                                @error('color')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Urutan</label>
                                <input type="number" name="order" value="{{ old('order', $item->order) }}"
                                    class="form-control" min="0">
                                @error('order')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="is_active" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active"> Aktif </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('admin.technologies.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
