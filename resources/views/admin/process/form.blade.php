@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title">{{ $item->exists ? 'Edit Langkah Proses' : 'Tambah Langkah Proses' }}</h4>
                <form method="POST" action="{{ $item->exists ? route('admin.process.update',$item) : route('admin.process.store') }}">
                    @csrf
                    @if($item->exists) @method('PUT') @endif
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Judul</label>
                            <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required>
                            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Urutan</label>
                            <input type="number" name="order" value="{{ old('order', $item->order) }}" class="form-control" min="0">
                            @error('order')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active"> Aktif </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" rows="5" class="form-control">{{ old('description', $item->description) }}</textarea>
                            @error('description')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mt-4 d-flex gap-2">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('admin.process.index') }}" class="btn btn-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
