@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Tambah Mahasiswa</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" name="nama" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
        </div>

        <!-- NIM -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">NIM</label>
            <input type="text" name="nim" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
        </div>

        <!-- Prodi -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Prodi</label>
            <input type="text" name="prodi" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
        </div>

        <!-- Tempat Magang -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Tempat Magang</label>
            <select name="tempat_magang_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
                <option value="">-- Pilih Tempat Magang --</option>
                @foreach ($tempatMagang as $tempat)
                    <option value="{{ $tempat->id }}">{{ $tempat->nama_tempat }}</option>
                @endforeach
            </select>
        </div>

        <!-- Upload Laporan (opsional) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Upload Laporan (PDF, max 2MB)</label>
            <input type="file" name="laporan" accept="application/pdf" class="w-full">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-500 text-white px-6 py-2 rounded hover:bg-indigo-600">Simpan</button>
        </div>
    </form>
</div>
@endsection
