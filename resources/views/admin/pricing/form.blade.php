@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->exists ? 'Edit Paket Harga' : 'Tambah Paket Harga' }}</h4>

                    <form action="{{ $item->exists ? route('admin.pricing.update', $item) : route('admin.pricing.store') }}"
                        method="POST">
                        @csrf
                        @if ($item->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Paket</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $item->name ?? '') }}" required>
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tagline (Penjelasan Singkat)</label>
                                <input type="text" name="tagline" class="form-control"
                                    value="{{ old('tagline', $item->tagline ?? '') }}">
                                @error('tagline')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Teks Harga (ex: 500rb / 1.5Jt)</label>
                                <input type="text" name="price_text" class="form-control"
                                    value="{{ old('price_text', $item->price_text ?? '') }}" required>
                                @error('price_text')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Subteks Harga (ex: /Project)</label>
                                <input type="text" name="price_subtext" class="form-control"
                                    value="{{ old('price_subtext', $item->price_subtext ?? '/Project') }}">
                                @error('price_subtext')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Badge (ex: Hemat / Populer)</label>
                                <input type="text" name="badge" class="form-control"
                                    value="{{ old('badge', $item->badge ?? '') }}">
                                @error('badge')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Pesan WhatsApp Otomatis</label>
                                <textarea name="whatsapp_message" class="form-control" rows="2">{{ old('whatsapp_message', $item->whatsapp_message ?? '') }}</textarea>
                                <div class="form-text text-muted">Contoh: Halo SyntaxTrust, saya tertarik dengan Paket
                                    Pelajar
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Urutan</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', $item->order ?? 0) }}" required>
                                @error('order')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="is_highlighted" value="1"
                                        id="is_highlighted"
                                        {{ old('is_highlighted', $item->is_highlighted) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_highlighted"> Highlight (Kartu Menonjol)
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="is_active" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active"> Aktif </label>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label mb-0 font-weight-bold">Daftar Fitur</label>
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="addFeature()">+
                                        Tambah
                                        Fitur</button>
                                </div>
                                <div id="feature-list">
                                    @php
                                        $oldTexts = old('feature_texts', []);
                                        $oldActives = old('feature_actives', []);

                                        $initialFeatures = [];
                                        if (!empty($oldTexts)) {
                                            foreach ($oldTexts as $k => $v) {
                                                $initialFeatures[$k] = [
                                                    'text' => $v,
                                                    'active' => isset($oldActives[$k]),
                                                ];
                                            }
                                        } elseif (isset($item) && !empty($item->features)) {
                                            $initialFeatures = $item->features;
                                        } else {
                                            $initialFeatures = [['text' => '', 'active' => true]];
                                        }
                                    @endphp

                                    @foreach ($initialFeatures as $key => $f)
                                        <div class="feature-item mb-2 d-flex gap-2">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="checkbox"
                                                        name="feature_actives[{{ $key }}]" value="1"
                                                        {{ $f['active'] ? 'checked' : '' }} title="Aktifkan fitur?">
                                                </div>
                                                <input type="text" name="feature_texts[{{ $key }}]"
                                                    class="form-control" value="{{ $f['text'] }}"
                                                    placeholder="Nama fitur...">
                                            </div>
                                            <button type="button" class="btn btn-outline-danger"
                                                onclick="removeFeature(this)">✕</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 pt-3 border-top d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.pricing.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('body')
        <script>
            let featureIdx = {{ count($initialFeatures) > 0 ? max(array_keys($initialFeatures)) + 1 : 1 }};

            function addFeature() {
                const container = document.getElementById('feature-list');
                const div = document.createElement('div');
                div.className = 'feature-item mb-2 d-flex gap-2';
                div.innerHTML = `
                <div class="input-group">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" name="feature_actives[${featureIdx}]" value="1" checked>
                    </div>
                    <input type="text" name="feature_texts[${featureIdx}]" class="form-control" placeholder="Nama fitur...">
                </div>
                <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">✕</button>
            `;
                container.appendChild(div);
                featureIdx++;
            }

            function removeFeature(btn) {
                const items = document.querySelectorAll('.feature-item');
                if (items.length > 1) {
                    btn.closest('.feature-item').remove();
                } else {
                    alert('Minimal harus ada 1 baris fitur.');
                }
            }
        </script>
    @endpush
@endsection
