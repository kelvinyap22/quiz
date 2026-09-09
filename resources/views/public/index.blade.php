@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2 class="fw-bold">Knowledge Base</h2>
        <p class="text-muted">Jelajahi informasi dan pengetahuan terkini.</p>
    </div>
    <div class="col-md-4">
        <form action="{{ route('public.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari pengetahuan..." value="{{ $search }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
</div>

<div class="row">
    @forelse($informasi as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-info text-dark mb-2 align-self-start">{{ $item->kategori->nama }}</span>
                    <h5 class="card-title fw-bold">{{ $item->judul }}</h5>
                    <p class="card-text text-secondary">{{ Str::limit($item->ringkasan, 100) }}</p>
                    <a href="{{ route('public.show', $item->id) }}" class="btn btn-outline-primary mt-auto">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center py-4">Belum ada informasi yang dipublikasikan.</div>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $informasi->links() }}
</div>
@endsection