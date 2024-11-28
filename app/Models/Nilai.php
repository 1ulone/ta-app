<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai'; // Pastikan tabel yang sesuai
    protected $fillable = ['jadwal_id', 'penguji_id', 'mahasiswa_id', 'jumlah', 'catatan'];

    // Relasi dengan model lain
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function penguji()
    {
        return $this->belongsTo(Penguji::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
