<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Mama Yuli @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar-warung { background: linear-gradient(135deg, #dc2626, #dc2626); }
        .sidebar { min-height: 100vh; background: #2c3e50; }
        .sidebar a { color: #ecf0f1; padding: 12px 15px; display: block; text-decoration: none; transition: all 0.2s; }
        .sidebar a:hover { background: #34495e; color: #f39c12; }
        /* Style untuk menandai menu aktif */
        .sidebar a.active { background: #34495e; color: #f39c12; font-weight: bold; border-left: 4px solid #f39c12; }
        .card-custom { border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <nav class="navbar navbar-warung navbar-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-utensils me-2"></i> Warung Mama Yuli
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
            <div class="col-md-2 sidebar p-3">
                <h5 class="text-white mb-3 px-2 d-none d-md-block"><i class="fas fa-bars"></i> Menu</h5>

<a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
</a>

<a href="{{ route('menu.index') }}" class="{{ request()->routeIs('menu.*') ? 'active' : '' }}">
    <i class="fas fa-utensils me-2"></i> Manajemen Menu
</a>

<a href="{{ route('karyawans.index') }}" class="{{ request()->routeIs('karyawans.*') ? 'active' : '' }}">
    <i class="fas fa-user-tie me-2"></i> SDM (Karyawan)
</a>

<a href="{{ route('stok.index') }}" class="{{ request()->routeIs('stok.*') ? 'active' : '' }}">
    <i class="fas fa-boxes me-2"></i> Stok Bahan
</a>

<a href="{{ Route::has('kritik.index') ? route('kritik.index') : '/kritik' }}" class="{{ request()->routeIs('kritik.*') ? 'active' : '' }}">
    <i class="fas fa-comment-dots me-2"></i> Kritik & Saran
</a>

<a href="{{ Route::has('jadwal.index') ? route('jadwal.index') : '/jadwal' }}" class="{{ request()->routeIs('jadwal.*') ? 'active' : '' }}">
    <i class="fas fa-calendar-alt me-2"></i> Jadwal Shift
</a>

<a href="{{ route('kategori_bahan.index') }}" class="{{ request()->routeIs('kategori_bahan.*') ? 'active' : '' }}">
    <i class="fas fa-tags me-2"></i> Kategori Bahan
</a>

<hr class="text-white-50 my-3">

<form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
    @csrf
    <button type="submit" class="btn btn-danger w-100 fw-bold text-start text-white py-2 px-3 d-flex align-items-center" style="border-radius: 8px;">
        <i class="fas fa-sign-out-alt me-2"></i> Keluar (Logout)
    </button>
</form>
            </div>

            <!-- KONTEN HALAMAN -->
            <div class="col-md-10 p-4 bg-light">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>