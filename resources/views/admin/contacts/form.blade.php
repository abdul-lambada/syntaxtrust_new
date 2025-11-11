@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title">{{ $item->exists ? 'Edit Kontak' : 'Tambah Kontak' }}</h4>
                <form method="POST" action="{{ $item->exists ? route('admin.contacts.update',$item) : route('admin.contacts.store') }}">
                    @csrf
                    @if($item->exists) @method('PUT') @endif
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Tipe</label>
                            <input type="text" name="type" value="{{ old('type', $item->type) }}" class="form-control" placeholder="email/whatsapp/address/other" required>
                            @error('type')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Label</label>
                            <input type="text" name="label" value="{{ old('label', $item->label) }}" class="form-control">
                            @error('label')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Urutan</label>
                            <input type="number" name="order" value="{{ old('order', $item->order) }}" class="form-control" min="0">
                            @error('order')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Value</label>
                            <input type="text" name="value" value="{{ old('value', $item->value) }}" class="form-control" required>
                            @error('value')<div class="text-danger small">{{ $message }}</div>@enderror
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
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
