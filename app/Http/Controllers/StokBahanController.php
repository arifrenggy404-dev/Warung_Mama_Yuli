<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\KategoriBahan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StokBahanController extends Controller
{
    // 1. MENAMPILKAN DAFTAR STOK
    public function index(Request $request)
    {
        $kategoris = KategoriBahan::all();
        
        // Menggunakan relasi 'kategori' sesuai model kamu
        $query = BahanBaku::with('kategori');
        if ($request->has('kategori_id') && $request->kategori_id != '') {
            $query->where('kategori_bahan_id', $request->kategori_id);
        }
        
        $bahan_bakus = $query->latest()->get();

        return view('stok.index', compact('bahan_bakus', 'kategoris'));
    }

    // 2. FORM TAMBAH BAHAN (Memperbaiki error Call to undefined method)
    public function create()
    {
        $kategoris = KategoriBahan::all();
        return view('stok.create', compact('kategoris'));
    }

    // 3. MENYIMPAN DATA BAHAN BARU
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_bahan_id' => 'required|exists:kategoris_bahan,id',
            'nama_bahan' => [
                'required',
                'string',
                'max:255',
                // Validasi agar tidak duplikat di kategori yang sama
                Rule::unique('bahan_baku')->where(function ($query) use ($request) {
                    return $query->where('kategori_bahan_id', $request->kategori_bahan_id);
                }),
            ],
            'satuan' => 'nullable|string|max:100',
            'stok' => 'required|numeric|min:0',
        ], [
            'nama_bahan.unique' => 'Bahan baku dengan nama tersebut sudah terdaftar di kategori ini!',
        ]);

        BahanBaku::create([
            'kategori_bahan_id' => $validated['kategori_bahan_id'],
            'nama_bahan' => $validated['nama_bahan'],
            'satuan' => $validated['satuan'],
            'stok' => $validated['stok'],
        ]);

        return redirect()->route('stok.index')
            ->with('success', 'Bahan berhasil ditambahkan.');
    }

    // 4. FORM EDIT BAHAN
    public function edit($id)
    {
        $stok = BahanBaku::findOrFail($id);
        $kategoris = KategoriBahan::all();
        
        return view('stok.edit', compact('stok', 'kategoris'));
    }

    // 5. MEMPROSES UPDATE DATA BAHAN
    public function update(Request $request, $id)
    {
        $bahan = BahanBaku::findOrFail($id);

        $validated = $request->validate([
            'kategori_bahan_id' => 'required|exists:kategoris_bahan,id',
            'nama_bahan' => [
                'required',
                'string',
                'max:255',
                // Unik kecuali untuk data yang sedang di-edit sendiri
                Rule::unique('bahan_baku')->where(function ($query) use ($request) {
                    return $query->where('kategori_bahan_id', $request->kategori_bahan_id);
                })->ignore($bahan->id),
            ],
            'satuan' => 'nullable|string|max:100',
            'stok' => 'required|numeric|min:0',
        ], [
            'nama_bahan.unique' => 'Bahan baku dengan nama tersebut sudah terdaftar di kategori ini!',
        ]);

        $bahan->update([
            'kategori_bahan_id' => $validated['kategori_bahan_id'],
            'nama_bahan' => $validated['nama_bahan'],
            'satuan' => $validated['satuan'],
            'stok' => $validated['stok'],
        ]);

        return redirect()->route('stok.index')
            ->with('success', 'Stok bahan berhasil diperbarui.');
    }

    // 6. MENGHAPUS DATA BAHAN BAKU
    public function destroy($id)
    {
        $bahan = BahanBaku::findOrFail($id);
        $bahan->delete();

        return redirect()->route('stok.index')
            ->with('success', 'Bahan baku berhasil dihapus.');
    }
}