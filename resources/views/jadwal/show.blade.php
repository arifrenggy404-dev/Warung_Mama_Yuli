@extends('layouts.app')

@section('title', ' - Detail Jadwal')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="d-flex flex-row justify-content-between align-items-center mb-3 gap-2">
        <h3 class="fw-bold mb-0 fs-4 fs-md-3">Detail Jadwal Shift</h3>
        <a href="{{ route('jadwal.index') }}" class="btn btn-sm btn-secondary py-2 px-3">
            <i class="fas fa-arrow-left me-1"></i> <span class="d-none d-sm-inline">Kembali</span>
        </a>
    </div>

    <div class="card shadow-sm p-3 p-md-4 border-0">
        
        <div class="list-group list-group-flush mb-4">
            
            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Tanggal</div>
                    <div class="col-8 col-md-9 fw-bold text-dark fs-6">{{ $jadwal->tanggal->format('d-m-Y') }}</div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Karyawan</div>
                    <div class="col-8 col-md-9 fw-bold text-dark fs-6">
                        <i class="fas fa-user text-muted me-2 d-none d-md-inline"></i>{{ $jadwal->karyawan->nama ?? '-' }}
                    </div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Shift</div>
                    <div class="col-8 col-md-9">
                        @php
                            $badgeColor = match(strtolower($jadwal->shift)) {
                                'pagi' => 'bg-success-subtle text-success border border-success-subtle',
                                'siang' => 'bg-warning-subtle text-warning-emphasis border border-warning-subtle',
                                'malam' => 'bg-danger-subtle text-danger border border-danger-subtle',
                                default => 'bg-info-subtle text-info'
                            };
                        @endphp
                        <span class="badge {{ $badgeColor }} px-2.5 py-1.5 fs-7 fw-bold">{{ $jadwal->shift }}</span>
                    </div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row align-items-center">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Jam Kerja</div>
                    <div class="col-8 col-md-9 text-dark">
                        <i class="far fa-clock text-muted me-2 d-none d-md-inline"></i>
                        {{ $jadwal->jam_mulai ? \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') : '-' }} - 
                        {{ $jadwal->jam_selesai ? \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') : '-' }}
                    </div>
                </div>
            </div>

            <div class="list-group-item px-0 py-3">
                <div class="row">
                    <div class="col-4 col-md-3 text-secondary fw-semibold small">Keterangan</div>
                    <div class="col-8 col-md-9 text-muted text-wrap">{{ $jadwal->keterangan ?? '-' }}</div>
                </div>
            </div>

        </div>

        <div class="d-flex flex-column flex-md-row justify-content-md-start gap-2">
            <a href="{{ route('jadwal.edit', $jadwal) }}" class="btn btn-warning w-100 w-md-auto py-2 px-4 fw-semibold">
                <i class="fas fa-edit me-2"></i>Edit Jadwal
            </a>
            <form action="{{ route('jadwal.destroy', $jadwal) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')" class="w-100 w-md-auto">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger w-100 py-2 px-4 fw-semibold" type="submit">
                    <i class="fas fa-trash-alt me-2"></i>Hapus Jadwal
                </button>
            </form>
        </div>

    </div>
</div>
@endsection