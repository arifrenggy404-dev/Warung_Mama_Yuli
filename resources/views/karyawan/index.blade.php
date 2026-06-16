@extends('layouts.app')

@section('title', ' - SDM')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="d-flex flex-row justify-content-between align-items-center mb-3 gap-2">
        <h3 class="fw-bold mb-0 fs-4 fs-md-3">SDM - Data Karyawan</h3>
        <a href="{{ route('karyawans.create') }}" class="btn btn-primary btn-md-lg py-2">
            <i class="fas fa-plus me-1"></i> <span class="d-none d-sm-inline">Tambah</span> Karyawan
        </a>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>No. HP</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th class="text-center" style="min-width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($karyawans as $karyawan)
                        <tr>
                            <td class="ps-3 fw-bold text-dark">{{ $karyawan->nama }}</td>
                            <td>
                                <span class="text-secondary small fw-semibold">
                                    <i class="fas fa-user-tag me-1 d-none d-md-inline text-muted"></i>{{ $karyawan->jabatan ?? '-' }}
                                </span>
                            </td>
                            <td>
                                @if($karyawan->no_hp)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $karyawan->no_hp) }}" target="_blank" class="text-decoration-none text-dark">
                                        <i class="fab fa-whatsapp text-success me-1"></i>{{ $karyawan->no_hp }}
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt me-1 d-none d-md-inline"></i>
                                    {{ $karyawan->tanggal_masuk ? \Carbon\Carbon::parse($karyawan->tanggal_masuk)->format('d-m-Y') : '-' }}
                                </small>
                            </td>
                            <td>
                                @if($karyawan->status_aktif)
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1.5 fs-7 fw-bold">Aktif</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2 py-1.5 fs-7 fw-bold">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('karyawans.edit', $karyawan) }}" class="btn btn-sm btn-outline-warning px-2.5 py-1.5" title="Edit Data">
                                        <i class="fas fa-edit"></i> <span class="d-none d-md-inline ms-1">Edit</span>
                                    </a>
                                    <form action="{{ route('karyawans.destroy', $karyawan) }}" method="POST" onsubmit="return confirm('Hapus data karyawan ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger px-2.5 py-1.5" type="submit" title="Hapus Data">
                                            <i class="fas fa-trash-alt"></i> <span class="d-none d-md-inline ms-1">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-users-slash fa-2x mb-2 d-block text-secondary"></i>
                                Belum ada data karyawan yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection