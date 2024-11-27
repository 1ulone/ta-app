<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    // Tentukan nama tabel secara eksplisit
    protected $table = 'nilai'; // Nama tabel tanpa 's'

    // Tentukan kolom yang dapat diisi
    protected $fillable = ['jadwal_id', 'penguji_id', 'jumlah', 'catatan'];

    // Relasi dengan Jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class); // Relasi dengan model Jadwal
    }

    // Relasi dengan Penguji
    public function penguji()
    {
        return $this->belongsTo(Penguji::class); // Relasi dengan model Penguji
    }
}
