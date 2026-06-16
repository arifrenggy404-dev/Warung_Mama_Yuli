<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Mama Yuli @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar-warung { background: linear-gradient(135deg, #ff6b35, #f7931e); }
        .sidebar { min-height: 100vh; background: #2c3e50; }
        .sidebar a { color: #ecf0f1; padding: 12px 15px; display: block; text-decoration: none; transition: all 0.2s; border-radius: 5px; margin-bottom: 2px; }
        .sidebar a:hover { background: #34495e; color: #f39c12; }
        /* Style untuk menandai menu aktif */
        .sidebar a.active { background: #34495e; color: #f39c12; font-weight: bold; border-left: 4px solid #f39c12; }
        .card-custom { border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        
        /* Penyesuaian khusus untuk versi Offcanvas Mobile */
        .offcanvas { background: #2c3e50; max-width: 280px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-warung navbar-dark shadow-sm sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler d-md-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMobile" aria-controls="sidebarMobile">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand fw-bold me-auto ms-2 ms-md-0" href="#">
                <i class="fas fa-utensils me-2"></i> Warung Mama Yuli
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-3 col-lg-2 sidebar p-3 d-none d-md-block">
                @include('partials.sidebar-links') </div>

            <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="sidebarMobile" aria-labelledby="sidebarMobileLabel">
                <div class="offcanvas-header text-white border-bottom border-secondary">
                    <h5 class="offcanvas-title fw-bold" id="sidebarMobileLabel"><i class="fas fa-utensils me-2"></i> Warung Mama Yuli</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body sidebar p-3">
                    @include('partials.sidebar-links')
                </div>
            </div>

            <div class="col-12 col-md-9 col-lg-10 p-3 p-md-4 bg-light min-vh-100">
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