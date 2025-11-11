@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title">{{ $item->exists ? 'Edit FAQ' : 'Tambah FAQ' }}</h4>
                <form method="POST" action="{{ $item->exists ? route('admin.faqs.update',$item) : route('admin.faqs.store') }}">
                    @csrf
                    @if($item->exists) @method('PUT') @endif
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Pertanyaan</label>
                            <input type="text" name="question" value="{{ old('question', $item->question) }}" class="form-control" required>
                            @error('question')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="category" value="{{ old('category', $item->category) }}" class="form-control">
                            @error('category')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Jawaban</label>
                            <textarea name="answer" rows="5" class="form-control" required>{{ old('answer', $item->answer) }}</textarea>
                            @error('answer')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Urutan</label>
                            <input type="number" name="order" value="{{ old('order', $item->order) }}" class="form-control" min="0">
                            @error('order')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active"> Aktif </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex gap-2">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
