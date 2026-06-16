@extends('layouts.app')

@section('title', ' - Kritik & Saran')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold mb-0 fs-4 fs-md-3">Kritik & Saran Pelanggan</h3>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden bg-white">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small text-uppercase">
                    <tr>
                        <th class="ps-3" style="width: 55%;">Isi Kritik / Saran</th>
                        <th style="width: 25%;">Tanggal Masuk</th>
                        <th style="width: 20%; min-width: 130px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kritiks as $kritik)
                        <tr>
                            <td class="ps-3 text-wrap text-dark" style="max-width: 280px; min-width: 200px;">
                                <span class="d-block text-truncate-custom fw-medium">{{ $kritik->isi }}</span>
                            </td>
                            <td>
                                <small class="text-secondary">
                                    <i class="far fa-clock me-1 d-none d-md-inline text-muted"></i>
                                    {{ $kritik->created_at->format('d-m-Y H:i') }}
                                </small>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('kritik.show', $kritik) }}" class="btn btn-sm btn-outline-info px-2.5 py-1.5" title="Lihat Detail">
                                        <i class="fas fa-eye"></i> <span class="d-none d-md-inline ms-1">Detail</span>
                                    </a>

                                    <form action="{{ route('kritik.destroy', $kritik) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-2.5 py-1.5" title="Hapus Ulasan">
                                            <i class="fas fa-trash-alt"></i> <span class="d-none d-md-inline ms-1">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                <i class="fas fa-comments-slash fa-2x mb-2 d-block text-secondary"></i>
                                Belum ada data kritik atau saran dari pelanggan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Sedikit CSS opsional jika ingin membatasi baris teks ulasan agar tidak terlalu panjang ke bawah --}}
<style>
    @media (max-width: 768px) {
        .text-truncate-custom {
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Maksimal ulasan muncul 2 baris di HP, sisanya klik detail */
            -webkit-box-orient: vertical;  
            overflow: hidden;
            white-space: normal;
        }
    }
</style>
@endsection