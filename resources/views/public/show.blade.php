@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <a href="{{ route('public.index') }}" class="btn btn-secondary btn-sm mb-3">&larr; Kembali</a>
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <span class="badge bg-info text-dark mb-2">{{ $informasi->kategori->nama }}</span>
                <h2 class="fw-bold mb-3">{{ $informasi->judul }}</h2>
                <p class="text-muted border-bottom pb-2">
                    <small>Sumber: <strong>{{ $informasi->sumber }}</strong> | Dipublikasikan: {{ $informasi->created_at->format('d M Y') }}</small>
                </p>
                <div class="lh-lg mt-4">
                    {!! nl2br(e($informasi->isi)) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection