@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Tambah Tempat Magang</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tempat-magang.store') }}" method="POST">
        @csrf

        {{-- ✅ Tambahkan input untuk kolom "nama" --}}
        <div class="mb-4">
            <label for="nama" class="block font-semibold">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="nama_tempat" class="block font-semibold">Nama Tempat</label>
            <input type="text" name="nama_tempat" id="nama_tempat" value="{{ old('nama_tempat') }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="alamat" class="block font-semibold">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('tempat-magang.index') }}" class="ml-4 text-gray-600">Batal</a>
    </form>
</div>
@endsection
