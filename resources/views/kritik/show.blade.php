@extends('layouts.app')

@section('title', ' - Detail Kritik')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="d-flex flex-row justify-content-between align-items-center mb-3 gap-2">
        <h3 class="fw-bold mb-0 fs-4 fs-md-3">Detail Kritik & Saran</h3>
        <a href="{{ route('kritik.index') }}" class="btn btn-sm btn-secondary py-2 px-3">
            <i class="fas fa-arrow-left me-1"></i> <span class="d-none d-sm-inline">Kembali</span>
        </a>
    </div>

    <div class="card shadow-sm p-3 p-md-4 border-0 bg-white">
        
        <div class="list-group list-group-flush mb-3">
            
            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Pelanggan</div>
                    <div class="col-8 col-md-9 fw-bold text-dark fs-6">
                        <i class="fas fa-user text-muted me-2 d-none d-md-inline"></i>{{ $kritik->nama_pelanggan ?? 'Anonim' }}
                    </div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Tanggal Masuk</div>
                    <div class="col-8 col-md-9 text-dark fw-medium">
                        <i class="far fa-calendar-alt text-muted me-2 d-none d-md-inline"></i>{{ $kritik->created_at->format('d-m-Y H:i') }}
                    </div>
                </div>
            </div>

            <div class="list-group-item px-0 py-4 border-0">
                <div class="row">
                    <div class="col-12 text-secondary fw-semibold small mb-2">Isi Kritik / Saran:</div>
                    <div class="col-12 text-dark bg-light p-3 rounded-3 shadow-inner" style="white-space: pre-wrap; line-height: 1.6; font-size: 0.95rem;">
                        {{ $kritik->isi }}
                    </div>
                </div>
            </div>

        </div>

        {{-- Tombol Aksi Tambahan (Opsional: Jika suatu saat ingin menambahkan tombol Hapus langsung di detail) --}}
        <div class="d-flex flex-column flex-md-row justify-content-md-start gap-2 pt-2">
            <form action="{{ route('kritik.destroy', $kritik) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')" class="w-100 w-md-auto">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger w-100 py-2 px-4 fw-bold">
                    <i class="fas fa-trash-alt me-2"></i>Hapus Ulasan
                </button>
            </form>
        </div>

    </div>
</div>
@endsection