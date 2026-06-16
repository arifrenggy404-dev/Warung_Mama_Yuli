<?php

namespace App\Http\Controllers;

use App\Models\KategoriBahan;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
public function index()
    {
        $kategoris = KategoriBahan::latest()->get();
        return view('kategori_bahan.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori_bahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|unique:kategoris_bahan,nama_kategori|max:255',
            'deskripsi'     => 'nullable|string',
        ]);

        KategoriBahan::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('kategori_bahan.index')
                         ->with('success', 'Kategori bahan berhasil ditambahkan!');
    }

   public function show($id)
    {
        $kategoriBahan = KategoriBahan::findOrFail($id);
        return view('kategori_bahan.show', compact('kategoriBahan'));
    }

   public function edit($id)
    {
        // Mencari data kategori berdasarkan id yang diklik
        $kategori = KategoriBahan::findOrFail($id);
        
        // Dikirim ke view dengan nama variabel 'kategori' agar sesuai dengan file edit.blade.php kita sebelumnya
        return view('kategori_bahan.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategoriBahan = KategoriBahan::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris_bahan,nama_kategori,' . $kategoriBahan->id,
            'deskripsi'     => 'nullable|string',
        ]);

        $kategoriBahan->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('kategori_bahan.index')
                         ->with('success', 'Kategori bahan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategoriBahan = KategoriBahan::findOrFail($id);
        $kategoriBahan->delete();

        return redirect()->route('kategori_bahan.index')
                         ->with('success', 'Kategori bahan berhasil dihapus!');
    }
}