@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Kelola Informasi (Admin)</h2>
    <a href="{{ route('admin.informasi.create') }}" class="btn btn-success">+ Tambah Informasi</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Sumber</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($informasi as $index => $item)
                        <tr>
                            <td>{{ $informasi->firstItem() + $index }}</td>
                            <td><strong>{{ $item->judul }}</strong></td>
                            <td><span class="badge bg-secondary">{{ $item->kategori->nama }}</span></td>
                            <td>{{ $item->sumber }}</td>
                            <td>
                                @if($item->status == 'published')
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-warning text-dark">Draft</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.informasi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                               
                                <form action="{{ route('admin.informasi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Data informasi masih kosong.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $informasi->links() }}
</div>
@endsection