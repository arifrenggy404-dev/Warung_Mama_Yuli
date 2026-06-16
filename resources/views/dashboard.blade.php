@extends('layouts.app')

@section('title', ' - Dashboard Admin')

@section('content')
<div class="container-fluid px-2 px-md-3">
    {{-- Header Dashboard: Menggunakan font-size responsif --}}
    <div class="row mb-3 mb-md-4">
        <div class="col-12 text-center">
            <h3 class="fw-bold text-dark mb-1 fs-4 fs-md-3">Dashboard Warung Mama Yuli</h3>
            <p class="text-muted small mb-0">Sistem Informasi UMKM Mie Ayam Mama Yuli</p>
        </div>
    </div>

    {{-- Baris Ringkasan Statistik (Summary Cards) --}}
    {{-- g-2 di mobile agar jarak antar card tidak terlalu renggang, g-3 di desktop --}}
    <div class="row g-2 g-md-3 mb-4">
        <div class="col-6 col-xl-3">
            <div class="card shadow-sm border-0 bg-primary text-white h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-white-50 small mb-1 fs-7">Total Menu</h6>
                        <h3 class="fw-bold mb-0 fs-3">{{ $jumlahMenu ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-utensils fa-2x opacity-50 d-none d-sm-block"></i>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="card shadow-sm border-0 bg-warning text-white h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-white-50 small mb-1 fs-7">Stok Bahan</h6>
                        <h3 class="fw-bold mb-0 fs-3">{{ $jumlahStok ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-boxes fa-2x opacity-50 d-none d-sm-block"></i>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="card shadow-sm border-0 bg-info text-white h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-white-50 small mb-1 fs-7">Kritik & Saran</h6>
                        <h3 class="fw-bold mb-0 fs-3">{{ $jumlahKritik ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-comments fa-2x opacity-50 d-none d-sm-block"></i>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="card shadow-sm border-0 bg-secondary text-white h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-white-50 small mb-1 fs-7">Jadwal Shift</h6>
                        <h3 class="fw-bold mb-0 fs-3">{{ $jumlahJadwal ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-calendar-alt fa-2x opacity-50 d-none d-sm-block"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Konten Utama: Menu Navigasi Gede --}}
    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            <div class="card shadow-sm border-0 bg-white">
                <div class="card-header bg-white py-3 text-center border-bottom-0">
                    <h5 class="mb-0 fw-bold text-dark fs-6 fs-md-5">Menu Navigasi Utama</h5>
                </div>
                <div class="card-body p-2 p-sm-3">
                    {{-- Grid Navigasi: g-2 di mobile, g-3 di desktop --}}
                    <div class="row g-2 g-md-3">
                        
                        <div class="col-6 col-sm-4">
                            <a href="{{ route('menu.index') }}" class="text-decoration-none text-dark h-100 d-block">
                                <div class="p-3 border rounded-3 text-center h-100 bg-light-subtle shadow-sm-hover custom-nav-card">
                                    <i class="fas fa-utensils fa-2x text-primary mb-2"></i>
                                    <p class="mb-0 fw-bold text-wrap text-break small">Manajemen Menu</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="{{ route('karyawans.index') }}" class="text-decoration-none text-dark h-100 d-block">
                                <div class="p-3 border rounded-3 text-center h-100 bg-light-subtle shadow-sm-hover custom-nav-card">
                                    <i class="fas fa-users fa-2x text-success mb-2"></i>
                                    <p class="mb-0 fw-bold text-wrap text-break small">SDM Karyawan</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="{{ route('stok.index') }}" class="text-decoration-none text-dark h-100 d-block">
                                <div class="p-3 border rounded-3 text-center h-100 bg-light-subtle shadow-sm-hover custom-nav-card">
                                    <i class="fas fa-boxes fa-2x text-warning mb-2"></i>
                                    <p class="mb-0 fw-bold text-wrap text-break small">Stok Bahan</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="{{ route('kritik.index') }}" class="text-decoration-none text-dark h-100 d-block">
                                <div class="p-3 border rounded-3 text-center h-100 bg-light-subtle shadow-sm-hover custom-nav-card">
                                    <i class="fas fa-comments fa-2x text-info mb-2"></i>
                                    <p class="mb-0 fw-bold text-wrap text-break small">Kritik & Saran</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="{{ route('jadwal.index') }}" class="text-decoration-none text-dark h-100 d-block">
                                <div class="p-3 border rounded-3 text-center h-100 bg-light-subtle shadow-sm-hover custom-nav-card">
                                    <i class="fas fa-calendar-alt fa-2x text-secondary mb-2"></i>
                                    <p class="mb-0 fw-bold text-wrap text-break small">Jadwal Shift</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="{{ route('kategori_bahan.index') }}" class="text-decoration-none text-dark h-100 d-block">
                                <div class="p-3 border rounded-3 text-center h-100 bg-light-subtle shadow-sm-hover custom-nav-card">
                                    <i class="fas fa-tags fa-2x text-danger mb-2"></i>
                                    <p class="mb-0 fw-bold text-wrap text-break small">Kategori Bahan</p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Tambahan CSS kecil untuk efek interaktif premium saat ditekan di HP --}}
<style>
    .shadow-sm-hover {
        transition: transform 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .shadow-sm-hover:active {
        transform: scale(0.96);
        background-color: var(--bs-gray-100) !important;
    }
    @media (min-width: 768px) {
        .shadow-sm-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }
    }
    /* Ukuran font spesifik utility */
    .fs-7 { font-size: 0.78rem !important; }
</style>
@endsection