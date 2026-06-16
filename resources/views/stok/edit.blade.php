@extends('layouts.app')

@section('title', '- Edit Stok Bahan')

@section('content')
<div class="card card-custom p-4">
    <h2 class="fw-bold mb-4 text-dark">Edit Data & Stok Bahan</h2>

    <form action="{{ route('stok.update', $stok->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Kategori</label>
                <select class="form-select" name="kategori_bahan_id" required>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}" {{ $stok->kategori_bahan_id == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Nama Bahan</label>
                <input type="text" class="form-control" name="nama_bahan" value="{{ old('nama_bahan', $stok->nama_bahan) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Satuan</label>
                <input type="text" class="form-control" name="satuan" value="{{ old('satuan', $stok->satuan) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Jumlah Stok</label>
                <input type="text" step="0.01" class="form-control" name="stok" value="{{ old('stok', $stok->stok) }}" required>
            </div>
        </div>

        <div class="d-flex gap-2 mt-2">
            <a href="{{ route('stok.index') }}" class="btn btn-secondary fw-bold px-4">Kembali</a>
            <button type="submit" class="btn btn-warning text-white fw-bold px-4">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection