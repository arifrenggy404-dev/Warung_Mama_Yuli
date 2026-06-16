<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::orderBy('created_at', 'desc')->get();
        return view('karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
{
    // 1. Validasi data input
    $request->validate([
        'nama'          => 'required|string|max:255',
        'jabatan'       => 'required|string|max:255',
        'jenis_kelamin' => 'required',
        'no_hp'         => 'required|string|max:15',
        'alamat'        => 'required|string',
        'tanggal_masuk' => 'required|date',
    ]);

    // 2. Simpan ke Database (Pastikan nama field sesuai dengan tabel database-mu)
    Karyawan::create([
        'nama'          => $request->nama,
        'jabatan'       => $request->jabatan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'no_hp'         => $request->no_hp,
        'alamat'        => $request->alamat,
        'tanggal_masuk' => $request->tanggal_masuk,
        'status'        => $request->has('status') ? 'Aktif' : 'Tidak Aktif', // Menangani checkbox
    ]);

    // 3. Kembalikan ke halaman daftar karyawan dengan pesan sukses
    return redirect()->route('karyawans.index')
                     ->with('success', 'Data karyawan berhasil ditambahkan!');
}

    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'no_hp' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'tanggal_masuk' => 'nullable|date',
            'status_aktif' => 'sometimes|boolean',
        ]);

        $validated['status_aktif'] = $request->has('status_aktif') ? true : false;

        $karyawan->update($validated);

        return redirect()->route('karyawans.index')->with('success', 'Data karyawan berhasil diupdate.');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawans.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}

