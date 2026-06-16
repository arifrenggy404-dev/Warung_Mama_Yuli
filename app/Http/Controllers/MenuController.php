<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // 1. TAMPILKAN DAFTAR MENU
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('menu.index', compact('menus'));
    }

    // 2. FORM TAMBAH MENU
    public function create()
    {
        return view('menu.create');
    }

    // 3. PROSES SIMPAN MENU BARU
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori'  => 'required|string',
            'harga'     => 'required|numeric|min:0',
            'status'    => 'required|string',
        ]);

        Menu::create($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    // 4. FORM EDIT MENU
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    // 5. PROSES UPDATE DATA MENU
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori'  => 'required|string',
            'harga'     => 'required|numeric|min:0',
            'status'    => 'required|string',
        ]);

        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    // 6. PROSES HAPUS MENU
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}