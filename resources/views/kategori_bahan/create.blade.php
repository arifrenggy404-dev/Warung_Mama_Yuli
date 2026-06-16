@extends('layouts.app')

@section('title', ' - Tambah Kategori Bahan')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="row mb-3 mb-md-4">
        <div class="col-12">
            <h3 class="fw-bold mb-1 fs-4 fs-md-3">Tambah Kategori Bahan</h3>
            <p class="text-muted small mb-0">Buat klasifikasi bahan baru untuk manajemen stok</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card card-custom border-0 bg-white shadow-sm">
                <div class="card-body p-3 p-md-4">
                    <form action="{{ route('kategori_bahan.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label fw-semibold text-secondary small">Nama Kategori <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" 
                                id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" 
                                placeholder="Contoh: Sayuran, Olahan Daging, Tepung" required>
                            @error('nama_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-semibold text-secondary small">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" 
                                    placeholder="Tambahkan catatan singkat mengenai kategori ini...">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="d-flex flex-column-reverse flex-md-row justify-content-md-between gap-2 pt-2">
                            <a href="{{ route('kategori_bahan.index') }}" class="btn btn-light border fw-semibold text-secondary w-100 w-md-auto py-2 px-4">
                                <i class="fas fa-arrow-left me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary fw-bold w-100 w-md-auto py-2 px-4">
                                <i class="fas fa-save me-2"></i>Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection