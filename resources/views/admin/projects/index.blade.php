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
                        <h4 class="card-title">Portofolio (Projects)</h4>
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <form method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="q" value="{{ $q }}" class="form-control"
                                placeholder="Cari title, category, client...">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th class="text-center">Aktif</th>
                                    <th class="text-center">Urutan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projects as $i => $item)
                                    <tr>
                                        <td>{{ $projects->firstItem() + $i }}</td>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($item->image) }}"
                                                    alt="img"
                                                    style="height:40px; width:60px; object-fit:cover; border-radius:4px;">
                                            @else
                                                <span class="text-muted small">No Img</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="fw-bold">{{ $item->title }}</div>
                                            <div class="small text-muted">{{ $item->slug }}</div>
                                        </td>
                                        <td>{{ $item->category }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $item->is_active ? 'Ya' : 'Tidak' }}
                                            </span>
                                        </td>
                                        <td class="text-center">{{ $item->order }}</td>
                                        <td>
                                            <a href="{{ route('admin.projects.edit', $item) }}"
                                                class="btn btn-sm btn-outline-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                data-id="{{ $item->id }}"
                                                data-name="{{ $item->title }}">Hapus</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $projects->links('pagination::bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Project</h5>
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
                document.getElementById('delForm').setAttribute('action', `{{ url('admin/projects') }}/${id}`);
            });
        </script>
    @endpush
@endsection
