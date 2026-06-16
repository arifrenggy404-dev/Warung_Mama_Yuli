<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Sistem Rifky</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* Latar belakang adaptif dengan overlay gelap yang solid */
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), 
                        url('https://images.unsplash.com/photo-1626132647523-66f5bf380027?q=80&w=1600&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
        }

        .card-login {
            border: none;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.96) !important;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px); /* Kompatibilitas Safari iOS */
        }

        /* Perbaikan struktur input-group agar efek focus menyatu dengan ikon */
        .input-group-custom {
            display: flex;
            align-items: center;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background-color: #ffffff;
            transition: all 0.3s ease;
        }

        /* Saat input grup aktif, border luar yang berubah secara menyeluruh */
        .input-group-custom:focus-within {
            border-color: #f59e0b;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15);
        }

        .input-group-custom .icon-addon {
            padding: 0.75rem 0 0.75rem 1rem;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-control-custom {
            border: none !important;
            box-shadow: none !important;
            padding: 0.75rem 1rem 0.75rem 0.75rem;
            background: transparent !important;
            font-size: 0.95rem;
            width: 100%;
            border-radius: 10px;
        }

        /* Tombol aksen warung makan */
        .btn-warung {
            background-color: #dc2626;
            color: #ffffff;
            border-radius: 10px;
            padding: 0.75rem;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
        }

        .btn-warung:hover, .btn-warung:focus {
            background-color: #b91c1c;
            color: #ffffff;
        }

        /* Efek klik membal aktif khusus layar sentuh/HP */
        .btn-warung:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 py-4 px-3">
        <div class="w-100" style="max-width: 410px;">
            
            {{-- Tombol Kembali --}}
            <div class="mb-3 mb-sm-4 text-start">
                <a href="/" class="btn btn-link text-decoration-none text-white p-0 d-inline-flex align-items-center fw-medium small opacity-75 link-opacity-100-hover">
                    <i class="bi bi-arrow-left me-2 fs-5"></i> Kembali ke halaman utama
                </a>
            </div>

            {{-- Card Login responsif: padding p-3.5 di HP, p-5 di Desktop --}}
            <div class="card card-login p-3.5 p-sm-5">
                <div class="mb-4 text-center">
                    <div class="text-danger mb-2">
                        <i class="bi bi-shop fs-1"></i>
                    </div>
                    <h2 class="fw-bold text-dark tracking-tight mb-1 fs-3 fs-sm-2" style="letter-spacing: -1px;">Warung Mama Yuli</h2>
                    <p class="text-muted small mb-0">Manajemen Bakso & Mie Ayam</p>
                </div>

                <form action="/login" method="POST">
                    @csrf
                    
                    {{-- Kolom Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-secondary small mb-1">Alamat Email</label>
                        <div class="input-group-custom">
                            <div class="icon-addon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <input type="email" class="form-control-custom" id="email" name="email" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    {{-- Kolom Password --}}
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold text-secondary small mb-1">Kata Sandi</label>
                        <div class="input-group-custom">
                            <div class="icon-addon">
                                <i class="bi bi-lock"></i>
                            </div>
                            <input type="password" class="form-control-custom" id="password" name="password" placeholder="••••••••" required>
                        </div>
                    </div>

                    {{-- Tombol Submit --}}
                    <button type="submit" class="btn btn-warung w-100 border-0 shadow-sm d-flex align-items-center justify-content-center gap-2">
                        <span>Masuk Ke Dashboard</span> <i class="bi bi-box-arrow-in-right fs-5"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>