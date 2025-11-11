@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('ok'))<div class="alert alert-success">{{ session('ok') }}</div>@endif
        <div class="card card-rounded">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">Timeline Proyek</h4>
                    <a href="{{ route('admin.timeline.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <form method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Cari...">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Urutan</th>
                                <th>Aktif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $i => $s)
                                <tr>
                                    <td>{{ $items->firstItem() + $i }}</td>
                                    <td>{{ $s->title }}</td>
                                    <td>{{ $s->order }}</td>
                                    <td><span class="badge {{ $s->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $s->is_active ? 'Ya' : 'Tidak' }}</span></td>
                                    <td>
                                        <a href="{{ route('admin.timeline.edit', $s) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" data-id="{{ $s->id }}" data-name="{{ $s->title }}">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center text-muted">Tidak ada data</td></tr>
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
  <div class="modal-dialog"><div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Hapus Data</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body"><p>Yakin ingin menghapus <strong id="delName"></strong>?</p></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form id="delForm" method="POST">@csrf @method('DELETE')<button type="submit" class="btn btn-danger">Hapus</button></form>
      </div>
  </div></div>
</div>
@push('body')
<script>
const modalT = document.getElementById('modalDelete');
modalT?.addEventListener('show.bs.modal', function (event) {
  const b = event.relatedTarget; const id = b.getAttribute('data-id'); const name = b.getAttribute('data-name');
  document.getElementById('delName').textContent = name;
  document.getElementById('delForm').setAttribute('action', `{{ url('admin/timeline') }}/${id}`);
});
</script>
@endpush
@endsection
