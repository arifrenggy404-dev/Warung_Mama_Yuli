<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu & Ulasan - Warung Mama Yuli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar-brand {
            font-size: 1.25rem;
        }
        @media (min-width: 768px) {
            .navbar-brand { font-size: 1.5rem; }
        }
        /* Efek hover lembut pada card menu */
        .card-menu {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        @media (min-width: 992px) {
            .card-menu:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
            }
        }
        .menu-icon-box {
            width: 45px;
            height: 45px;
            background-color: #fff5f2;
            color: #ff6b35;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0; /* Mencegah ikon gepeng saat teks judul menu panjang */
        }
        @media (min-width: 768px) {
            .menu-icon-box {
                width: 50px;
                height: 50px;
                font-size: 1.3rem;
            }
        }
        .btn-kirim {
            background-color: #dc2626;
            color: white;
            border: none;
            transition: 0.2s;
        }
        .btn-kirim:hover {
            background-color: #e55a2b;
            color: white;
        }
        /* Membatasi tinggi teks deskripsi di mobile agar simetris */
        .text-clamp-desc {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body>

    {{-- Navbar Utama Atas --}}
    {{-- mb-4 di mobile agar hemat ruang, mb-5 di desktop --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow-sm py-3 mb-4 mb-md-5">
        <div class="container px-3">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
                <i class="fas fa-utensils me-2"></i> Warung Mama Yuli
            </a>
            <div class="ms-auto">
                <a href="/" class="btn btn-outline-light btn-sm rounded-pill px-3 fs-7">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </nav>

    <div class="container px-3">
        {{-- order-lg-last memposisikan Form Ulasan di atas Daftar Menu khusus pada tampilan layar HP --}}
        <div class="row g-4 flex-column-reverse flex-lg-row">
            
            {{-- KOLOM KIRI: Daftar Menu Berbentuk Card --}}
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-3 mb-md-4">
                    <div class="bg-danger text-white rounded-circle p-2 me-2.5 d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px; flex-shrink:0;">
                        <i class="fas fa-book-open fa-sm"></i>
                    </div>
                    <h4 class="fw-bold m-0 text-dark fs-4 fs-md-3">Daftar Menu Spesial</h4>
                </div>

                {{-- Grid Menu: col-12 bertumpuk di HP, col-sm-6 berjejer dua di tablet/desktop --}}
                <div class="row g-3">
                    @forelse($daftarMenu as $menu)
                        <div class="col-12 col-sm-6">
                            <div class="card card-menu h-100 shadow-sm border-0">
                                <div class="card-body d-flex flex-column justify-content-between p-3 p-md-4">
                                    
                                    <div>
                                        <div class="d-flex align-items-center mb-2.5">
                                            {{-- Icon pengganti gambar menu --}}
                                            <div class="menu-icon-box me-3">
                                                <i class="fas fa-bowl-rice"></i>
                                            </div>
                                            <h5 class="card-title fw-bold text-dark m-0 fs-6 fs-md-5">{{ $menu->nama_menu }}</h5>
                                        </div>
                                        <p class="text-muted small mb-0 text-clamp-desc">
                                            {{ $menu->deskripsi ?? 'Hidangan istimewa, dibuat segar dengan bahan-bahan pilihan berkualitas tinggi.' }}
                                        </p>
                                    </div>

                                    {{-- Bagian Harga --}}
                                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                        <span class="text-secondary small fw-medium">Harga nett</span>
                                        <span class="fw-extrabold text-danger fs-5 fw-bold">
                                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card border-0 text-center p-4 p-md-5 shadow-sm rounded-4">
                                <div class="card-body py-4">
                                    <i class="fas fa-store-slash fa-2x text-muted mb-3"></i>
                                    <h6 class="text-secondary fw-bold">Mohon Maaf</h6>
                                    <p class="text-muted small mb-0">Daftar menu saat ini belum tersedia atau sedang diperbarui.</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- KOLOM KANAN: Kotak Formulir Kirim Ulasan --}}
            <div class="col-lg-4">
                {{-- position-sticky dinonaktifkan di mobile (style inline dihilangkan, dilempar ke desktop style jika butuh) --}}
                <div class="card border-0 shadow-sm p-2 p-md-3 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-comment-dots text-warning fa-lg me-2"></i>
                            <h5 class="fw-bold m-0 text-dark fs-5">Beri Ulasan</h5>
                        </div>
                        <p class="text-muted small mb-3">Punya keluhan, kritik, atau saran? Sampaikan masukan Anda di bawah ini.</p>

                        {{-- Alert Sukses --}}
                        @if(session('success'))
                            <div class="alert alert-success d-flex align-items-center gap-2 rounded-3 py-2 px-3 mb-3 border-0 shadow-sm" role="alert">
                                <i class="fas fa-circle-check text-success"></i>
                                <span class="small fw-medium">{{ session('success') }}</span>
                            </div>
                        @endif

                        {{-- Alert Error Global --}}
                        @if($errors->any())
                            <div class="alert alert-danger d-flex align-items-center gap-2 rounded-3 py-2 px-3 mb-3 border-0 shadow-sm" role="alert">
                                <i class="fas fa-circle-exclamation text-danger"></i>
                                <span class="small fw-medium">Mohon periksa kembali isian Anda.</span>
                            </div>
                        @endif

                        <form action="{{ route('kritik.store') }}" method="POST" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="isi" class="form-label small fw-bold text-secondary">Isi Ulasan / Saran</label>
                                <textarea 
                                    class="form-control @error('isi') is-invalid @else @if(old('isi')) is-valid @endif @enderror" 
                                    id="isi" 
                                    name="isi" 
                                    rows="4" 
                                    placeholder="Ketik ulasan atau saran Anda di sini..."
                                    style="border-radius: 10px; resize: none; font-size: 0.9rem;"
                                    required>{{ old('isi') }}</textarea>

                                {{-- Pesan error spesifik --}}
                                @error('isi')
                                    <div class="invalid-feedback d-flex align-items-center gap-1 small">
                                        <i class="fas fa-triangle-exclamation fa-sm"></i>
                                        {{ $message }}
                                    </div>
                                @enderror

                                {{-- Pesan sukses inline --}}
                                @if(!$errors->has('isi') && old('isi'))
                                    <div class="valid-feedback d-block small">
                                        <i class="fas fa-check me-1"></i> Ulasan siap dikirim!
                                    </div>
                                @endif

                                {{-- Counter karakter --}}
                                <div class="d-flex justify-content-end mt-1">
                                    <small class="text-muted" style="font-size: 0.75rem;" id="charCount">0 / 1000 karakter</small>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-kirim w-100 fw-bold py-2 rounded-3 shadow-sm">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Ulasan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-white py-4 mt-5 border-top text-center">
        <div class="container px-3">
            <p class="mb-0 text-muted small">&copy; {{ date('Y') }} Warung Mama Yuli. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const textarea = document.getElementById('isi');
        const charCount = document.getElementById('charCount');

        if (textarea) {
            charCount.textContent = textarea.value.length + ' / 1000 karakter';

            textarea.addEventListener('input', function () {
                const len = this.value.length;
                charCount.textContent = len + ' / 1000 karakter';

                if (len >= 900) {
                    charCount.classList.add('text-danger');
                    charCount.classList.remove('text-muted');
                } else {
                    charCount.classList.remove('text-danger');
                    charCount.classList.add('text-muted');
                }
            });
        }
    </script>
</body>
</html>