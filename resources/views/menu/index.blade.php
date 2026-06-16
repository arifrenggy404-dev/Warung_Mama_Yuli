@extends('layouts.app')

@section('title', '- Manajemen Menu')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="d-flex flex-row justify-content-between align-items-center mb-3 gap-2">
        <h3 class="fw-bold mb-0 fs-4 fs-md-3 text-dark">Menu Warung Mama Yuli</h3>
        <a href="{{ route('menu.create') }}" class="btn btn-primary py-2 px-3 shadow-sm">
            <i class="fas fa-plus me-1"></i> <span class="d-none d-sm-inline">Tambah</span> Menu
        </a>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden bg-white">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small text-uppercase">
                    <tr>
                        <th class="ps-3">Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th class="text-center" style="min-width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menus as $m)
                        <tr>
                            <td class="ps-3 fw-bold text-dark">{{ $m->nama_menu }}</td>
                            <td>
                                <span class="badge bg-light text-dark border fw-medium px-2 py-1">
                                    {{ $m->kategori }}
                                </span>
                            </td>
                            <td class="text-success fw-bold">Rp {{ number_format($m->harga, 0, ',', '.') }}</td>
                            <td>
                                @if($m->status == 'Tersedia')
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1.5 fs-7 fw-bold">Tersedia</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1.5 fs-7 fw-bold">Habis</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('menu.edit', $m->id) }}" class="btn btn-sm btn-outline-warning px-2.5 py-1.5" title="Edit Menu">
                                        <i class="fas fa-edit"></i> <span class="d-none d-md-inline ms-1">Edit</span>
                                    </a>

                                    <form action="{{ route('menu.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-2.5 py-1.5" title="Hapus Menu">
                                            <i class="fas fa-trash-alt"></i> <span class="d-none d-md-inline ms-1">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fas fa-utensils fa-2x mb-2 d-block text-secondary"></i>
                                Belum ada data menu makanan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection