<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    // Tentukan nama tabel secara eksplisit
    protected $table = 'jadwal'; // Nama tabel tanpa 's'

    // Relasi dengan Nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class); // Relasi satu ke banyak dengan model Nilai
    }
}
