@extends('admin.layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    @if(session('ok'))<div class="alert alert-success">{{ session('ok') }}</div>@endif
    <div class="card card-rounded">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title">Pengaturan Situs</h4>
          <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Situs</th>
                    <th>Logo</th>
                    <th>Aktif</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($items as $i => $it)
              <tr>
                <td>{{ $items->firstItem()+$i }}</td>
                <td>{{ $it->site_name }}</td>
                <td>
                  @php($logo = $it->logo_path && !str_starts_with($it->logo_path,'http') ? Storage::url($it->logo_path) : $it->logo_path)
                  @if($logo)
                    <img src="{{ $logo }}" alt="logo" style="height:30px">
                  @else
                    <span class="text-muted">—</span>
                  @endif
                </td>
                <td><span class="badge {{ $it->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $it->is_active ? 'Ya' : 'Tidak' }}</span></td>
                <td class="text-muted">{{ $it->created_at }}</td>
                <td>
                  <a href="{{ route('admin.settings.edit',$it) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                  <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" data-id="{{ $it->id }}" data-name="{{ $it->site_name }}">Hapus</button>
                </td>
              </tr>
            @empty
              <tr><td colspan="6" class="text-center text-muted">Tidak ada data</td></tr>
            @endforelse
            </tbody>
          </table>
        </div>
        <div class="mt-3">{{ $items->links('pagination::bootstrap-5') }}</div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog"><div class="modal-content">
    <div class="modal-header"><h5 class="modal-title">Hapus Pengaturan</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
    <div class="modal-body">Yakin ingin menghapus <strong id="delName"></strong>?</div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      <form id="delForm" method="POST">@csrf @method('DELETE')<button class="btn btn-danger" type="submit">Hapus</button></form>
    </div>
  </div></div>
</div>
@push('body')
<script>
const modal = document.getElementById('modalDelete');
modal?.addEventListener('show.bs.modal', function (e){
  const b = e.relatedTarget; const id = b.getAttribute('data-id'); const name = b.getAttribute('data-name');
  document.getElementById('delName').textContent = name;
  document.getElementById('delForm').setAttribute('action', `{{ url('admin/settings') }}/${id}`);
});
</script>
@endpush
@endsection
