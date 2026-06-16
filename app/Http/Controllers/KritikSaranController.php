<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    public function index()
    {
        $kritiks = KritikSaran::orderBy('created_at', 'desc')->get();
        return view('kritik.index', compact('kritiks'));
    }

    public function create()
    {
        
    }

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

    public function show(KritikSaran $kritik)
    {
        return view('kritik.show', compact('kritik'));
    }

    public function edit(Request $id)
    {
        
    }

    public function update(Request $request, Request $id)
    {

    }

    public function destroy(KritikSaran $kritik)
{
    $kritik->delete();
    return redirect()->route('kritik.index')
                    ->with('success', 'Ulasan berhasil dihapus.');
}
}

