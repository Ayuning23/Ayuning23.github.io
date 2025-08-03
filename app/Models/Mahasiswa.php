<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Beritahu Laravel bahwa nama tabel bukan default (bukan mahasiswa), tapi mahasiswas
    protected $table = 'mahasiswas';

    protected $fillable = [
        'nama', 'nim', 'prodi', 'tempat_magang_id', 'laporan'
    ];

  public function tempatMagang() {
    return $this->belongsTo(TempatMagang::class, 'tempat_magang_id');
}

}
