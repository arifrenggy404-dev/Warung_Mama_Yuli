@extends('layouts.app')

@section('title', ' - Edit Karyawan')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <h3 class="fw-bold mb-3 fs-4 fs-md-3">Edit Data Karyawan</h3>

    <form action="{{ route('karyawans.update', $karyawan) }}" method="POST" class="card p-3 p-md-4 shadow-sm border-0">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label class="form-label fw-semibold text-secondary small">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $karyawan->nama) }}" class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label fw-semibold text-secondary small">Jabatan</label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $karyawan->jabatan) }}" class="form-control @error('jabatan') is-invalid @enderror">
                @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label fw-semibold text-secondary small">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" @selected(old('jenis_kelamin', $karyawan->jenis_kelamin)=='Laki-laki') border-0>Laki-laki</option>
                    <option value="Perempuan" @selected(old('jenis_kelamin', $karyawan->jenis_kelamin)=='Perempuan')>Perempuan</option>
                </select>
                @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label fw-semibold text-secondary small">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $karyawan->no_hp) }}" class="form-control @error('no_hp') is-invalid @enderror">
                @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold text-secondary small">Alamat</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat', $karyawan->alamat) }}</textarea>
                @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label fw-semibold text-secondary small">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $karyawan->tanggal_masuk) }}" class="form-control @error('tanggal_masuk') is-invalid @enderror">
                @error('tanggal_masuk')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6 d-md-flex align-items-center">
                <div class="mt-md-4 pt-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="status_aktif" id="status_aktif" value="1" {{ old('status_aktif', $karyawan->status_aktif) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold text-dark" for="status_aktif">
                            Status Aktif (Karyawan masih bekerja)
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex flex-column-reverse flex-md-row justify-content-md-start gap-2">
            <a href="{{ route('karyawans.index') }}" class="btn btn-secondary w-100 w-md-auto py-2 px-4 fw-bold">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
            <button class="btn btn-primary w-100 w-md-auto py-2 px-4 fw-bold" type="submit">
                <i class="fas fa-sync-alt me-2"></i>Update Data
            </button>
        </div>
    </form>
</div>
@endsection