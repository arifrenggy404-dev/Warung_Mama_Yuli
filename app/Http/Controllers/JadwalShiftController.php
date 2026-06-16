<?php

namespace App\Http\Controllers;

use App\Models\JadwalShift;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class JadwalShiftController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->get('tanggal');

        $query = JadwalShift::with('karyawan')->orderBy('tanggal')->orderBy('shift');
        if ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        }

        $jadwalList = $query->get();
        $karyawans = Karyawan::orderBy('nama')->get();

        return view('jadwal.index', compact('jadwalList', 'karyawans', 'tanggal'));
    }

    public function create()
    {
        $karyawans = Karyawan::orderBy('nama')->get();
        return view('jadwal.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'shift' => 'required|in:Pagi,Siang,Malam',
            'jam_mulai' => 'nullable|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i',
            'keterangan' => 'nullable|string|max:255',
        ]);

        JadwalShift::create($validated);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal shift berhasil ditambahkan.');
    }

    public function show(JadwalShift $jadwal)
    {
        return view('jadwal.show', compact('jadwal'));
    }

    public function edit(JadwalShift $jadwal)
    {
        $karyawans = Karyawan::orderBy('nama')->get();
        return view('jadwal.edit', compact('jadwal', 'karyawans'));
    }

    public function update(Request $request, JadwalShift $jadwal)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'shift' => 'required|in:Pagi,Siang,Malam',
            'jam_mulai' => 'nullable|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $jadwal->update($validated);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal shift berhasil diupdate.');
    }

    public function destroy(JadwalShift $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal shift berhasil dihapus.');
    }
}

