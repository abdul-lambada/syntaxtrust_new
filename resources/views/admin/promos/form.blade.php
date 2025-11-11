@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title">{{ $item->exists ? 'Edit Promo' : 'Tambah Promo' }}</h4>
                <form method="POST" action="{{ $item->exists ? route('admin.promos.update',$item) : route('admin.promos.store') }}">
                    @csrf
                    @if($item->exists) @method('PUT') @endif
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Judul</label>
                            <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required>
                            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jenis Diskon</label>
                            <select name="discount_type" class="form-select">
                                <option value="percent" {{ old('discount_type', $item->discount_type)=='percent'?'selected':'' }}>Percent</option>
                                <option value="fixed" {{ old('discount_type', $item->discount_type)=='fixed'?'selected':'' }}>Fixed</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Amount</label>
                            <input type="number" step="0.01" name="amount" value="{{ old('amount', $item->amount) }}" class="form-control" required>
                            @error('amount')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mulai</label>
                            <input type="datetime-local" name="starts_at" value="{{ old('starts_at', optional($item->starts_at)->format('Y-m-d\TH:i')) }}" class="form-control">
                            @error('starts_at')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Berakhir</label>
                            <input type="datetime-local" name="ends_at" value="{{ old('ends_at', optional($item->ends_at)->format('Y-m-d\TH:i')) }}" class="form-control">
                            @error('ends_at')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" rows="4" class="form-control">{{ old('description', $item->description) }}</textarea>
                            @error('description')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active"> Aktif </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex gap-2">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('admin.promos.index') }}" class="btn btn-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
