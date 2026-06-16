<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Dashboard;
use App\Models\JadwalShift;
use App\Models\Karyawan;
use App\Models\KritikSaran;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Dashboardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Mengambil jumlah total data dari database
    $jumlahMenu = Menu::count();
    $jumlahStok = BahanBaku::count(); // atau hitung stok yang menipis tergantung kebutuhan
    $jumlahKritik = KritikSaran::count(); 
    $jumlahJadwal = JadwalShift::count();

    // Data terbaru (untuk sidebar kanan Anda)
    $menuTerbaru = Menu::latest()->first()->nama_menu ?? '-';
    $karyawanTerbaru = Karyawan::latest()->first()->nama_karyawan ?? '-';
    $jumlahStok = BahanBaku::where('stok', '<', 5)->count(); // contoh kondisi stok tipis
    $kritikTerbaru = KritikSaran::latest()->first()->isi_kritik ?? '-';

    return view('dashboard', compact(
        'jumlahMenu', 
        'jumlahStok', 
        'jumlahKritik', 
        'jumlahJadwal',
        'menuTerbaru',
        'karyawanTerbaru',
        'kritikTerbaru'
    ));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|in:mie_ayam,bakso,minuman',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|max:2048',
            'tersedia' => 'boolean'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('Dasboards', 'public');
        }

        Dashboard::create($validated);
return redirect()->route('Dashboard.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $Dashboard)
    {
return view('dashboard.show', compact('Dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $Dashboard)
    {
return view('dashboard.edit', compact('Dashboard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $Dashboard)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|in:mie_ayam,bakso,minuman',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|max:2048',
            'tersedia' => 'boolean'
        ]);

        if ($request->hasFile('gambar')) {
            if ($Dashboard->gambar) {
                Storage::delete($Dashboard->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('menus', 'public');
        }

        $Dashboard->update($validated);
return redirect()->route('Dashboard.index')->with('success', 'Menu berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        $dashboard->delete();
return redirect()->route('Dashboard.index')->with('success', 'Menu berhasil dihapus!');
    }
}
