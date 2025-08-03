<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatMagang;

class TempatMagangController extends Controller
{
    // ✅ Tampilkan semua data tempat magang
    
public function index()
{
    // Ambil semua data tempat magang
    $tempatMagang = TempatMagang::all();

    // Kirim ke view
    return view('tempat_magang.index', compact('tempatMagang'));
}

    // ✅ Tampilkan form tambah tempat magang
    public function create()
    {
       return view('mahasiswa.create', compact('tempatMagang'));

    }

    // ✅ Simpan data tempat magang baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'nama_tempat' => 'required|unique:tempat_magangs,nama_tempat',
            'alamat' => 'required',
        ]);

        // Simpan ke database
        TempatMagang::create([
            'nama' => $request->nama,
            'nama_tempat' => $request->nama_tempat,
            'alamat' => $request->alamat,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('tempat-magang.index')->with('success', 'Tempat magang berhasil disimpan!');
    }

    // ✅ Tampilkan form edit tempat magang
    public function edit($id)
    {
        $tempatMagang = TempatMagang::findOrFail($id);
        return view('tempat_magang.edit', compact('tempatMagang'));
    }

    // ✅ Simpan hasil edit tempat magang
    public function update(Request $request, $id)
    {
        $tempatMagang = TempatMagang::findOrFail($id);

        // Validasi data (izinkan nama_tempat yang sama seperti sebelumnya)
        $request->validate([
            'nama' => 'required',
            'nama_tempat' => 'required|unique:tempat_magangs,nama_tempat,' . $id,
            'alamat' => 'required',
        ]);

        // Update data
        $tempatMagang->update([
            'nama' => $request->nama,
            'nama_tempat' => $request->nama_tempat,
            'alamat' => $request->alamat,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('tempat-magang.index')->with('success', 'Data tempat magang berhasil diperbarui!');
    }

    // ✅ Hapus data tempat magang
    public function destroy($id)
    {
        $tempatMagang = TempatMagang::findOrFail($id);
        $tempatMagang->delete();

        return redirect()->route('tempat-magang.index')->with('success', 'Data tempat magang berhasil dihapus!');
    }
}
