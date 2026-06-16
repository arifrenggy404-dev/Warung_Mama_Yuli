@extends('layouts.app') 

@section('title', '- Daftar Kategori Bahan')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="d-flex flex-row justify-content-between align-items-center mb-3 gap-2">
        <h3 class="fw-bold mb-0 fs-4 fs-md-3">Daftar Kategori Bahan</h3>
        
        <a href="{{ route('kategori_bahan.create') }}" class="btn btn-primary py-2 px-3 shadow-sm">
            <i class="fas fa-plus me-1"></i> <span class="d-none d-sm-inline">Tambah</span> Kategori
        </a>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden bg-white">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small text-uppercase">
                    <tr>
                        <th class="ps-3" style="width: 5%;">NO</th>
                        <th style="width: 30%;">NAMA KATEGORI</th>
                        <th style="width: 45%;">DESKRIPSI</th>
                        <th style="width: 20%; min-width: 130px;" class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoris as $key => $kategori)
                        <tr>
                            <td class="ps-3 text-secondary small">{{ $key + 1 }}</td>
                            <td class="fw-bold text-dark">{{ $kategori->nama_kategori }}</td>
                            <td class="text-muted text-wrap" style="max-width: 300px;">
                                <small>{{ $kategori->deskripsi ?? '-' }}</small>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('kategori_bahan.edit', $kategori->id) }}" class="btn btn-sm btn-outline-warning px-2.5 py-1.5" title="Edit Kategori">
                                        <i class="fas fa-edit"></i> <span class="d-none d-md-inline ms-1">Edit</span>
                                    </a>

                                    <form action="{{ route('kategori_bahan.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-2.5 py-1.5" title="Hapus Kategori">
                                            <i class="fas fa-trash-alt"></i> <span class="d-none d-md-inline ms-1">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="fas fa-boxes fa-2x mb-2 d-block text-secondary"></i>
                                Belum ada data kategori bahan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection