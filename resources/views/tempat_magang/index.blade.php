@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Tempat Magang</h1>
        <a href="{{ route('tempat-magang.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Tambah Tempat</a>
    </div>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama Instansi</th>
                <th class="border px-4 py-2">Alamat</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tempatMagang as $index => $tempat)
            <tr>
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $tempat->nama_tempat }}</td> <!-- GANTI DI SINI -->
                <td class="border px-4 py-2">{{ $tempat->alamat }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('tempat-magang.edit', $tempat->id) }}" class="text-blue-500 hover:underline mr-2">Edit</a>
                    <form action="{{ route('tempat-magang.destroy', $tempat->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
