@extends('layouts.app')

@section('title', '- Tambah Karyawan')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <h3 class="fw-bold mb-3 fs-4 fs-md-3">Tambah Data Karyawan</h3>

    <div class="card card-custom p-3 p-md-4 shadow-sm border-0">

        {{-- Alert ringkas jika ada error validasi global --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('karyawans.store') }}" method="POST">
            @csrf

            <div class="row g-3 mb-3">
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-secondary small">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required placeholder="Masukkan nama karyawan">
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-secondary small">Jabatan</label>
                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" required placeholder="Contoh: Kasir, Koki, Pelayan">
                    @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-secondary small">Jenis Kelamin</label>
                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" @selected(old('jenis_kelamin') == 'Laki-laki')>Laki-laki</option>
                        <option value="Perempuan" @selected(old('jenis_kelamin') == 'Perempuan')>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-secondary small">No. HP / WhatsApp</label>
                    <input type="tel" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required placeholder="Contoh: 081234567xxx">
                    @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary small">Alamat Rumah</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3" required placeholder="Tulis alamat lengkap tinggal sekarang">{{ old('alamat') }}</textarea>
                @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-secondary small">Tanggal Masuk</label>
                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required>
                    @error('tanggal_masuk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 col-md-6 d-md-flex align-items-center">
                    <div class="form-check mt-md-4 pt-md-2">
                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold text-dark" for="status">
                            Status Aktif (Bisa masuk jadwal shift)
                        </label>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column-reverse flex-md-row justify-content-md-start gap-2">
                <a href="{{ route('karyawans.index') }}" class="btn btn-secondary w-100 w-md-auto py-2 px-4 fw-bold">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
                <button type="submit" class="btn btn-primary w-100 w-md-auto py-2 px-4 fw-bold">
                    <i class="fas fa-save me-2"></i>Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection