@extends('layouts.app')

@section('title', '- Edit Kategori Bahan')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="mb-3 mb-md-4">
        <h3 class="fw-bold m-0 text-dark fs-4 fs-md-3">Edit Kategori Bahan</h3>
        <p class="text-muted small">Ubah data kategori bahan yang dipilih</p>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card card-custom p-3 p-md-4 shadow-sm border-0 bg-white">
                <form action="{{ route('kategori_bahan.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label fw-semibold text-secondary small">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" 
                            id="nama_kategori" name="nama_kategori" 
                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                        @error('nama_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-semibold text-secondary small">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                            id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-column-reverse flex-md-row justify-content-md-start gap-2 pt-2">
                        <a href="{{ route('kategori_bahan.index') }}" class="btn btn-secondary w-100 w-md-auto py-2 px-4 fw-bold">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-warning text-white w-100 w-md-auto py-2 px-4 fw-bold">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection