@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Mahasiswa</h2>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" name="prodi" class="form-control" value="{{ $mahasiswa->prodi }}" required>
        </div>

        <div class="mb-3">
            <label for="tempat_magang_id" class="form-label">Tempat Magang</label>
            <select name="tempat_magang_id" class="form-control" required>
                @foreach ($tempatMagang as $tempat)
                    <option value="{{ $tempat->id }}" {{ $mahasiswa->tempat_magang_id == $tempat->id ? 'selected' : '' }}>
                        {{ $tempat->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="laporan" class="form-label">Upload Laporan (PDF)</label>
            <input type="file" name="laporan" accept="application/pdf" class="form-control">
            @if ($mahasiswa->laporan)
                <p class="mt-2">
                    Laporan saat ini:
                    <a href="{{ asset('storage/laporan/' . $mahasiswa->laporan) }}" target="_blank" class="text-blue-600 underline">
                        {{ $mahasiswa->laporan }}
                    </a>
                </p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
