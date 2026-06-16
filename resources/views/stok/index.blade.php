@extends('layouts.app')

@section('title', '- Manajemen Stok Bahan')

@section('content')
<div class="card card-custom p-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0 text-dark">Manajemen Stok Bahan Baku</h2>
        
        {{-- Tombol dialihkan ke halaman create khusus --}}
        <a href="{{ route('stok.create') }}" class="btn btn-primary fw-bold px-3 py-2" style="border-radius: 8px;">
            <i class="fas fa-plus me-1"></i> Tambah Bahan
        </a>
    </div>

    {{-- Bagian Filter Kategori --}}
    <div class="card bg-light border-0 p-3 mb-4">
        <form action="{{ route('stok.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-4">
                <select class="form-select" name="kategori_id">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}" {{ request('kategori_id') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-bold px-3">Tampilkan</button>
                <a href="{{ route('stok.index') }}" class="btn btn-outline-secondary fw-bold px-3">Reset</a>
            </div>
        </form>
    </div>

    {{-- Tabel Utama Stok Bahan --}}
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light text-secondary small text-uppercase">
                <tr>
                    <th style="width: 25%;">Kategori</th>
                    <th style="width: 30%;">Nama Bahan</th>
                    <th style="width: 15%;">Satuan</th>
                    <th style="width: 15%;">Stok</th>
                    <th style="width: 15%;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bahan_bakus as $bahan)
                    <tr>
                        {{-- DIUBAH DI SINI: Menggunakan $bahan->kategori sesuai dengan model Anda --}}
                        <td class="text-dark">{{ $bahan->kategori->nama_kategori ?? '-' }}</td>
                        
                        <td class="fw-bold text-dark">{{ $bahan->nama_bahan }}</td>
                        <td class="text-muted">{{ $bahan->satuan }}</td>
                        {{-- Diubah menjadi teks keterangan jumlah stok biasa, bukan input box --}}
                        <td class="text-muted">{{ $bahan->stok }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                {{-- Tombol Edit mengarah ke halaman baru --}}
                                <a href="{{ route('stok.edit', $bahan->id) }}" class="btn btn-warning btn-sm text-white fw-bold px-3">
                                    Edit
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('stok.destroy', $bahan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bahan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm fw-bold px-3">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data stok bahan baku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection