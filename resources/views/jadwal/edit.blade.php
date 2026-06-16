@extends('layouts.app')

@section('title', ' - Edit Jadwal')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <h3 class="fw-bold mb-3 fs-4 fs-md-3">Edit Jadwal Shift</h3>

    <form action="{{ route('jadwal.update', $jadwal) }}" method="POST" class="card p-3 p-md-4 shadow-sm border-0">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6 col-12">
                <label class="form-label fw-semibold text-secondary">Karyawan</label>
                <select name="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror" required>
                    @foreach($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}" @selected(old('karyawan_id', $jadwal->karyawan_id)==$karyawan->id)>
                            {{ $karyawan->nama }}
                        </option>
                    @endforeach
                </select>
                @error('karyawan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6 col-12">
                <label class="form-label fw-semibold text-secondary">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $jadwal->tanggal) }}" class="form-control @error('tanggal') is-invalid @enderror" required>
                @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6 col-12">
                <label class="form-label fw-semibold text-secondary">Shift</label>
                <select name="shift" class="form-select @error('shift') is-invalid @enderror" required>
                    @foreach(['Pagi','Siang','Malam'] as $s)
                        <option value="{{ $s }}" @selected(old('shift', $jadwal->shift)==$s)>{{ $s }}</option>
                    @endforeach
                </select>
                @error('shift')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3 col-6">
                <label class="form-label fw-semibold text-secondary">Jam Mulai</label>
                <input type="time" name="jam_mulai" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" class="form-control @error('jam_mulai') is-invalid @enderror">
                @error('jam_mulai')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3 col-6">
                <label class="form-label fw-semibold text-secondary">Jam Selesai</label>
                <input type="time" name="jam_selesai" value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" class="form-control @error('jam_selesai') is-invalid @enderror">
                @error('jam_selesai')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-12 col-12">
                <label class="form-label fw-semibold text-secondary">Keterangan</label>
                <input type="text" name="keterangan" value="{{ old('keterangan', $jadwal->keterangan) }}" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Contoh: Lembur / Tukar Shift">
                @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="mt-4 d-flex flex-column-reverse flex-md-row justify-content-md-start gap-2">
            <a href="{{ route('jadwal.index') }}" class="btn btn-secondary w-100 w-md-auto py-2 px-4">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
            <button class="btn btn-primary w-100 w-md-auto py-2 px-4" type="submit">
                <i class="fas fa-sync-alt me-2"></i>Update
            </button>
        </div>
    </form>
</div>
@endsection