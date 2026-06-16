@extends('layouts.app')

@section('title', ' - Detail Karyawan')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="d-flex flex-row justify-content-between align-items-center mb-3 gap-2">
        <h3 class="fw-bold mb-0 fs-4 fs-md-3">Detail Karyawan</h3>
        <a href="{{ route('karyawans.index') }}" class="btn btn-sm btn-secondary py-2 px-3">
            <i class="fas fa-arrow-left me-1"></i> <span class="d-none d-sm-inline">Kembali</span>
        </a>
    </div>

    <div class="card shadow-sm p-3 p-md-4 border-0">
        
        <div class="list-group list-group-flush mb-4">
            
            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Nama Lengkap</div>
                    <div class="col-8 col-md-9 fw-bold text-dark fs-6">{{ $karyawan->nama }}</div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Jabatan</div>
                    <div class="col-8 col-md-9 text-dark fw-medium">
                        <i class="fas fa-user-tag text-muted me-2 d-none d-md-inline"></i>{{ $karyawan->jabatan ?? '-' }}
                    </div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Jenis Kelamin</div>
                    <div class="col-8 col-md-9 text-dark">
                        @if(($karyawan->jenis_kelamin) == 'Laki-laki')
                            <i class="fas fa-mars text-primary me-1"></i>
                        @elseif(($karyawan->jenis_kelamin) == 'Perempuan')
                            <i class="fas fa-venus text-danger me-1"></i>
                        @endif
                        {{ $karyawan->jenis_kelamin ?? '-' }}
                    </div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">No. HP / WA</div>
                    <div class="col-8 col-md-9">
                        @if($karyawan->no_hp)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $karyawan->no_hp) }}" target="_blank" class="text-decoration-none fw-semibold text-success">
                                <i class="fab fa-whatsapp me-1"></i>{{ $karyawan->no_hp }}
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Tanggal Masuk</div>
                    <div class="col-8 col-md-9 text-dark">
                        <i class="far fa-calendar-alt text-muted me-2 d-none d-md-inline"></i>
                        {{ $karyawan->tanggal_masuk ? \Carbon\Carbon::parse($karyawan->tanggal_masuk)->format('d-m-Y') : '-' }}
                    </div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Status Kerja</div>
                    <div class="col-8 col-md-9">
                        @if($karyawan->status_aktif)
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 fs-7 fw-bold">Aktif</span>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2.5 py-1.5 fs-7 fw-bold">Nonaktif</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Alamat Rumah</div>
                    <div class="col-8 col-md-9 text-muted text-wrap">{{ $karyawan->alamat ?? '-' }}</div>
                </div>
            </div>

        </div>

        <div class="d-flex flex-column flex-md-row justify-content-md-start gap-2">
            <a href="{{ route('karyawans.edit', $karyawan) }}" class="btn btn-warning w-100 w-md-auto py-2 px-4 fw-bold">
                <i class="fas fa-edit me-2"></i>Edit Data
            </a>
            <form action="{{ route('karyawans.destroy', $karyawan) }}" method="POST" onsubmit="return confirm('Hapus data karyawan ini?')" class="w-100 w-md-auto">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger w-100 py-2 px-4 fw-bold" type="submit">
                    <i class="fas fa-trash-alt me-2"></i>Hapus Karyawan
                </button>
            </form>
        </div>

    </div>
</div>
@endsection