<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Warung Mama Yuli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1552566626-52f8b828add9?q=80&w=1470&auto=format&fit=crop') no-repeat center center/cover;
            height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .btn-custom {
            background: #dc2626;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 30px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background: #f7931e;
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="hero-section">
        <div class="container">
            <i class="fas fa-utensils fa-4x mb-4 text-warning"></i>
            <h1 class="display-3 fw-bold mb-3">Warung Mama Yuli</h1>
            <p class="lead mb-5">Sistem Informasi Manajemen Kuliner • Mie Ayam • Bakso • Minuman</p>
            
    <a href="/lihatmenu" class="btn btn-outline-light rounded-pill px-4 py-2 me-2">
        <i class="fas fa-book-open me-2"></i> Lihat Menu & Saran
    </a>

    <a href="/login" class="btn btn-custom">
        <i class="fas fa-sign-in-alt me-2"></i> Login Admin
    </a>  

        </div>
    </div>

</body>
</html>