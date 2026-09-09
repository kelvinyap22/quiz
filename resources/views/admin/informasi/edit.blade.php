@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold">Edit Informasi</div>
            <div class="card-body">
                <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST">
                    @csrf
                    @method('PUT') 

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror">
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->id }}" {{ old('kategori_id', $informasi->kategori_id) == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $informasi->judul) }}">
                        @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ringkasan</label>
                        <textarea name="ringkasan" class="form-control @error('ringkasan') is-invalid @enderror" rows="2">{{ old('ringkasan', $informasi->ringkasan) }}</textarea>
                        @error('ringkasan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Lengkap</label>
                        <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="5">{{ old('isi', $informasi->isi) }}</textarea>
                        @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Sumber</label>
                            <input type="text" name="sumber" class="form-control @error('sumber') is-invalid @enderror" value="{{ old('sumber', $informasi->sumber) }}">
                            @error('sumber') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="draft" {{ old('status', $informasi->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $informasi->status) == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection