<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\Dashboardcontroller; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController; 
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PublikController;
use App\Http\Controllers\StokBahanController;
use Illuminate\Support\Facades\Route;


// 1. HALAMAN PERTAMA (Sebelum Login) - Sekarang aman tidak tertimpa lagi
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ✅ Letakkan di luar semua middleware, sebelum Route::middleware([...])
Route::get('/lihatmenu', [PublikController::class, 'menu'])->name('lihatmenu');
Route::post('/kirim-ulasan', [PublikController::class, 'store'])->name('user.ulasan.store');
Route::post('/kritik', [\App\Http\Controllers\KritikSaranController::class, 'store'])->name('kritik.store');
Route::resource('kritik', \App\Http\Controllers\KritikSaranController::class);
// 2. AUTH ROUTE (Login & Logout)
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 3. DASHBOARD UTAMA (Setelah Login)
Route::get('/dashboard', [Dashboardcontroller::class, 'index'])->middleware('auth')->name('dashboard');

// 4. MODUL MANAJEMEN (Khusus Admin setelah Login)
Route::middleware(['auth', 'can:admin'])->group(function () {
    
    // Manajemen Dashboard Admin
    Route::resource('Dashboard', Dashboardcontroller::class)->except(['index','show']);

    // Manajemen Karyawan
    Route::resource('karyawans', \App\Http\Controllers\KaryawanController::class);

    // Manajemen Stok Bahan (Menggunakan Route Manual Anda)
    Route::get('/stok', [StokBahanController::class, 'index'])->name('stok.index');
    Route::get('/stok/create', [StokBahanController::class, 'create'])->name('stok.create'); 
    Route::post('/stok', [StokBahanController::class, 'store'])->name('stok.store');
    Route::get('/stok/{id}/edit', [StokBahanController::class, 'edit'])->name('stok.edit');
    Route::put('/stok/{id}', [StokBahanController::class, 'update'])->name('stok.update');
    Route::delete('/stok/{id}', [StokBahanController::class, 'destroy'])->name('stok.destroy');

    // Manajemen Kategori Bahan
    Route::resource('kategori_bahan', KategoriController::class)->names('kategori_bahan');
    
    // Manajemen Kritik Saran & Jadwal Shift
  
    Route::resource('jadwal', \App\Http\Controllers\JadwalShiftController::class);

    // MANAJEMEN MENU (Cukup di sini saja, otomatis mencakup semua fungsi CRUD)

// Rute untuk menampilkan halaman daftar menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Rute untuk menampilkan halaman form tambah (Sebab Error Anda)
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');

// Rute untuk memproses penyimpanan data menu baru
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');

// Rute untuk menampilkan halaman form edit
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');

// Rute untuk memproses hapus data
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

// Rute untuk memproses pembaruan data menu yang diedit
Route::put('/menu/{id}/edit', [MenuController::class, 'update'])->name('menu.edit');

});