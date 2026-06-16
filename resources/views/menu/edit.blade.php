@extends('layouts.app')

@section('title', '- Edit Menu')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <h3 class="fw-bold text-dark mb-3 fs-4 fs-md-3">Edit Data Menu</h3>

    <div class="card card-custom p-3 p-md-4 shadow-sm border-0 bg-white">
        <form action="{{ route('menu.update', $menu->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-secondary small">Nama Menu <span class="text-danger">*</span></label>
                    <input type="text" name="nama_menu" class="form-control @error('nama_menu') is-invalid @enderror" 
                        value="{{ old('nama_menu', $menu->nama_menu) }}" required>
                    @error('nama_menu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-secondary small">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="Mie Ayam" @selected(old('kategori', $menu->kategori) == 'Mie Ayam')>Mie Ayam</option>
                        <option value="Bakso" @selected(old('kategori', $menu->kategori) == 'Bakso')>Bakso</option>
                        <option value="Minuman" @selected(old('kategori', $menu->kategori) == 'Minuman')>Minuman</option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-secondary small">Harga (Rp) <span class="text-danger">*</span></label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" 
                        value="{{ old('harga', intval($menu->harga)) }}" min="0" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-secondary small">Status Keberadaan <span class="text-danger">*</span></label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="Tersedia" @selected(old('status', $menu->status) == 'Tersedia')>Tersedia</option>
                        <option value="Habis" @selected(old('status', $menu->status) == 'Habis')>Habis</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex flex-column-reverse flex-md-row justify-content-md-start gap-2 pt-2">
                <a href="{{ route('menu.index') }}" class="btn btn-outline-secondary w-100 w-md-auto py-2 px-4 fw-bold">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-warning text-white w-100 w-md-auto py-2 px-4 fw-bold">
                    <i class="fas fa-save me-2"></i>Perbarui Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection