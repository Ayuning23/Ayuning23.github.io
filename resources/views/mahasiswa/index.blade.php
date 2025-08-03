@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">📋 Data Mahasiswa</h2>
        <a href="{{ route('mahasiswa.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            ➕ Tambah Mahasiswa
        </a>
    </div>

    <table class="min-w-full divide-y divide-gray-300 border border-gray-300 shadow-sm">
        <thead class="bg-blue-100">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">No</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nama</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">NIM</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Prodi</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Tempat Magang</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Laporan</th> <!-- Kolom laporan baru -->
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($mahasiswas as $mahasiswa)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $mahasiswa->nama }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $mahasiswa->nim }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $mahasiswa->prodi }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">
                        {{ $mahasiswa->tempatMagang->nama_tempat ?? '-' }}
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-700">
                        @if ($mahasiswa->laporan)
                            <a href="{{ asset('laporan/' . $mahasiswa->laporan) }}" target="_blank" class="text-blue-500 underline">Download</a>
                        @else
                            <span class="text-gray-500">Belum Upload</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data ini?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                        <!-- resources/views/mahasiswa/index.blade.php -->
                        <form action="{{ route('mahasiswa.index') }}" method="GET" class="mb-4">
                            <input type="text" name="search" placeholder="Cari Mahasiswa..." 
                                class="border rounded-lg px-4 py-2 w-1/3" value="{{ request('search') }}">
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Cari</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
