@extends('layouts.app')

@section('title', '- Tambah Stok Bahan')

@section('content')
<div class="card card-custom p-4">
    <h2 class="fw-bold mb-4 text-dark">Tambah Bahan Secara Manual</h2>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stok.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Kategori</label>
                <select class="form-select" name="kategori_bahan_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Nama Bahan</label>
                <input type="text" class="form-control" name="nama_bahan" required placeholder="Contoh: Mie Goreng">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Satuan</label>
                <input type="text" class="form-control" name="satuan" required placeholder="Contoh: kg, liter, pcs">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Stok Awal</label>
                <input type="text" class="form-control" name="stok" required value="0">
            </div>
        </div>

        <div class="d-flex gap-2 mt-2">
            <a href="{{ route('stok.index') }}" class="btn btn-secondary fw-bold px-4">Kembali</a>
            <button type="submit" class="btn btn-primary fw-bold px-4">Tambah Bahan</button>
        </div>
    </form>
</div>
@endsection