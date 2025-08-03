<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\TempatMagang;

class MahasiswaController extends Controller
{
    // app/Http/Controllers/MahasiswaController.php
public function index(Request $request)
{
    $query = Mahasiswa::with('tempatMagang');

    if ($request->has('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('nim', 'like', '%' . $request->search . '%')
              ->orWhere('prodi', 'like', '%' . $request->search . '%');
    }

    $mahasiswa = $query->get();

    return view('mahasiswa.index', [
    'mahasiswas' => Mahasiswa::all()
]);

}

    public function create()
    {
        $tempatMagang = TempatMagang::all();
        return view('mahasiswa.create', compact('tempatMagang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim',
            'prodi' => 'required|string|max:100',
            'tempat_magang_id' => 'required|exists:tempat_magangs,id',
            'laporan' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $filename = null;

        if ($request->hasFile('laporan')) {
            $file = $request->file('laporan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('laporan'), $filename);
        }

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'tempat_magang_id' => $request->tempat_magang_id,
            'laporan' => $filename,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'prodi' => 'required',
            'tempat_magang_id' => 'required|exists:tempat_magangs,id',
            'laporan' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('laporan')) {
            // Hapus file lama jika ada
            if ($mahasiswa->laporan && file_exists(public_path('laporan/' . $mahasiswa->laporan))) {
                unlink(public_path('laporan/' . $mahasiswa->laporan));
            }

            $file = $request->file('laporan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('laporan'), $filename);
            $mahasiswa->laporan = $filename;
        }

        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'tempat_magang_id' => $request->tempat_magang_id,
            'laporan' => $mahasiswa->laporan,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus file jika ada
        if ($mahasiswa->laporan && file_exists(public_path('laporan/' . $mahasiswa->laporan))) {
            unlink(public_path('laporan/' . $mahasiswa->laporan));
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
    public function edit($id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);
    $tempatMagang = TempatMagang::all(); // untuk dropdown pilihan
    return view('mahasiswa.edit', compact('mahasiswa', 'tempatMagang'));
}

}
