@extends('layouts.app')

@section('title', ' - Jadwal Shift')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="d-flex flex-row justify-content-between align-items-center mb-3 gap-2">
        <h3 class="fw-bold mb-0 fs-4 fs-md-3">Jadwal Kerja / Shift</h3>
        <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-md-lg py-2">
            <i class="fas fa-plus me-1"></i> <span class="d-none d-sm-inline">Tambah</span> Jadwal
        </a>
    </div>

    <form method="GET" action="{{ route('jadwal.index') }}" class="card p-3 shadow-sm border-0 mb-3">
        <div class="row g-2 align-items-end">
            <div class="col-12 col-md-4">
                <label class="form-label fw-semibold text-secondary small">Filter Tanggal</label>
                <input type="date" name="tanggal" value="{{ $tanggal }}" class="form-control">
            </div>
            <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100" type="submit">
                    <i class="fas fa-search me-1"></i> Cari
                </button>
            </div>
            <div class="col-6 col-md-2">
                <a href="{{ route('jadwal.index') }}" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-undo me-1"></i> Reset
                </a>
            </div>
        </div>
    </form>

    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Tanggal</th>
                        <th>Karyawan</th>
                        <th>Shift</th>
                        <th>Jam Kerja</th>
                        <th>Keterangan</th>
                        <th class="text-center" style="min-width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwalList as $jadwal)
                        <tr>
                            <td class="ps-3 fw-semibold">{{ $jadwal->tanggal->format('d-m-Y') }}</td>
                            <td>
                                <div class="fw-bold text-dark">{{ $jadwal->karyawan->nama ?? '-' }}</div>
                            </td>
                            <td>
                                @php
                                    $badgeColor = match(strtolower($jadwal->shift)) {
                                        'pagi' => 'bg-success-subtle text-success border border-success-subtle',
                                        'siang' => 'bg-warning-subtle text-warning-emphasis border border-warning-subtle',
                                        'malam' => 'bg-danger-subtle text-danger border border-danger-subtle',
                                        default => 'bg-info-subtle text-info'
                                    };
                                @endphp
                                <span class="badge {{ $badgeColor }} px-2 py-1.5 fs-7">{{ $jadwal->shift }}</span>
                            </td>
                            <td>
                                <i class="far fa-clock text-muted me-1"></i>
                                {{ $jadwal->jam_mulai ? \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') : '-' }} - 
                                {{ $jadwal->jam_selesai ? \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') : '-' }}
                            </td>
                            <td class="text-wrap" style="max-width: 200px;">
                                <small class="text-muted">{{ $jadwal->keterangan ?? '-' }}</small>
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('jadwal.edit', $jadwal) }}" class="btn btn-sm btn-outline-warning px-3 py-1.5">
                                        <i class="fas fa-edit"></i> <span class="d-none d-md-inline">Edit</span>
                                    </a>
                                    <form action="{{ route('jadwal.destroy', $jadwal) }}" method="POST" onsubmit="return confirm('Hapus jadwal ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger px-3 py-1.5" type="submit">
                                            <i class="fas fa-trash-alt"></i> <span class="d-none d-md-inline">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="fas fa-calendar-times fa-2x mb-2 d-block"></i>
                                Belum ada data jadwal untuk tanggal ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection