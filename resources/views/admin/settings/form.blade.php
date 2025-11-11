@extends('admin.layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-rounded">
      <div class="card-body">
        <h4 class="card-title">{{ $item->exists ? 'Edit Pengaturan' : 'Tambah Pengaturan' }}</h4>
        <form method="POST" action="{{ $item->exists ? route('admin.settings.update',$item) : route('admin.settings.store') }}" enctype="multipart/form-data">
          @csrf
          @if($item->exists) @method('PUT') @endif
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nama Situs</label>
              <input type="text" name="site_name" value="{{ old('site_name', $item->site_name) }}" class="form-control" required>
              @error('site_name')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6 d-flex align-items-end">
              <div class="form-check mt-4">
                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active"> Aktif </label>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Logo (gambar)</label>
              <input type="file" name="logo_file" class="form-control" accept="image/*">
              @error('logo_file')<div class="text-danger small">{{ $message }}</div>@enderror
              @if($item->logo_path)
                @php($logo = str_starts_with($item->logo_path,'http') || str_starts_with($item->logo_path,'/') ? $item->logo_path : Storage::url($item->logo_path))
                <div class="mt-2 d-flex align-items-center gap-3">
                  <img src="{{ $logo }}" alt="logo" style="height:48px" class="border rounded p-1 bg-white">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remove_logo" value="1" id="remove_logo">
                    <label class="form-check-label" for="remove_logo"> Hapus logo </label>
                  </div>
                </div>
              @endif
            </div>
          </div>
          <div class="mt-4 d-flex gap-2">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="{{ route('admin.settings.index') }}" class="btn btn-light">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
