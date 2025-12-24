@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('ok'))
                <div class="alert alert-success">{{ session('ok') }}</div>
            @endif
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title card-title-dash">Daftar Paket Harga</h4>
                        <a href="{{ route('admin.pricing.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <form method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="q" value="{{ $q }}" class="form-control"
                                placeholder="Cari nama, tagline, atau harga...">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Badge</th>
                                    <th>Highlight</th>
                                    <th>Aktif</th>
                                    <th>Urutan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $i => $item)
                                    <tr>
                                        <td>{{ $items->firstItem() + $i }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price_text }} {{ $item->price_subtext }}</td>
                                        <td><span
                                                class="badge {{ $item->badge ? 'bg-primary' : 'text-muted' }}">{{ $item->badge ?? '-' }}</span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $item->is_highlighted ? 'bg-info' : 'bg-secondary' }}">
                                                {{ $item->is_highlighted ? 'Ya' : 'Tidak' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $item->is_active ? 'Ya' : 'Tidak' }}
                                            </span>
                                        </td>
                                        <td>{{ $item->order }}</td>
                                        <td>
                                            <a href="{{ route('admin.pricing.edit', $item) }}"
                                                class="btn btn-sm btn-outline-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                data-id="{{ $item->id }}"
                                                data-name="{{ $item->name }}">Hapus</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $items->links('pagination::bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus <strong id="delName"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="delForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('body')
        <script>
            const modal = document.getElementById('modalDelete');
            modal?.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                document.getElementById('delName').textContent = name;
                document.getElementById('delForm').setAttribute('action', `{{ url('admin/pricing') }}/${id}`);
            });
        </script>
    @endpush
@endsection
