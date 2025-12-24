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
                        <h4 class="card-title">Permintaan Jadwal</h4>
                    </div>
                    <form method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="q" value="{{ $q }}" class="form-control"
                                placeholder="Cari nama/topik/metode/status...">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Metode</th>
                                    <th>Waktu</th>
                                    <th>Topik</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $i => $s)
                                    <tr>
                                        <td>{{ $items->firstItem() + $i }}</td>
                                        <td>{{ $s->name }}</td>
                                        <td>{{ strtoupper($s->method) }}</td>
                                        <td>{{ $s->when_at }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($s->topic, 40) }}</td>
                                        <td><span class="badge bg-info text-dark">{{ $s->status }}</span></td>
                                        <td>
                                            <a href="{{ route('admin.meeting-requests.edit', $s) }}"
                                                class="btn btn-sm btn-outline-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                data-id="{{ $s->id }}"
                                                data-name="{{ $s->name }}">Hapus</button>
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
                    <h5 class="modal-title">Hapus Jadwal</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus <strong id="delName"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="delForm" method="POST">@csrf @method('DELETE')<button type="submit"
                            class="btn btn-danger">Hapus</button></form>
                </div>
            </div>
        </div>
    </div>
    @push('body')
        <script>
            const modalM = document.getElementById('modalDelete');
            modalM?.addEventListener('show.bs.modal', function(event) {
                const b = event.relatedTarget;
                const id = b.getAttribute('data-id');
                const name = b.getAttribute('data-name');
                document.getElementById('delName').textContent = name;
                document.getElementById('delForm').setAttribute('action', `{{ url('admin/meeting-requests') }}/${id}`);
            });
        </script>
    @endpush
@endsection
