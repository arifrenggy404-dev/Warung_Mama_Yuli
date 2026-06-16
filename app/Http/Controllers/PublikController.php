<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\KritikSaran; // Pastikan nama model sesuai dengan tabel kritik & saran Anda
use Illuminate\Http\Request;

class PublikController extends Controller
{
    /**
     * Menampilkan halaman utama user berisi daftar menu, harga, dan form ulasan.
     */
    public function menu()
    {
        // Mengambil semua data menu beserta harganya dari database
        $daftarMenu = Menu::all();
        $ulasan = \App\Models\KritikSaran::latest()->get(); // tambahkan ini


        return view('lihatmenu', compact('daftarMenu','ulasan'));
    }

    /**
     * Menyimpan ulasan (kritik & saran) yang dikirim oleh user.
     */
    public function store(Request $request)
{
    $request->validate([
        'isi' => 'required|string|min:5|max:1000',
    ], [
        'isi.required' => 'Ulasan tidak boleh kosong.',
        'isi.min'      => 'Ulasan minimal 5 karakter.',
        'isi.max'      => 'Ulasan maksimal 1000 karakter.',
    ]);

    KritikSaran::create(['isi' => $request->isi]);

    return redirect()->back()->with('success', 'Terima kasih! Ulasan Anda berhasil dikirim.');
}
}