<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktivitasMahasiswa extends Model
{
    //Semua model pada laravel bentukannya gini

    protected $table = 'aktivitas_mahasiswa'; //nama tabel pada database
    protected $primaryKey = 'aktivitas_mahasiswa_id'; //nama id/primary key tabel

    //isi tabel (kolom yang dapat diisi)
    protected $fillable = [
        'aktivitas_id',
        'mahasiswa_id',
        'status_daftar',
        'tanggal_daftar',
    ];


    /*-------------------------------------------------------
    Tidak semua model memiliki fungsi ini
    Fungsi ini bertujukan jika tabel memiliki relasi
    Fungsi ini lanjutan dari relasi dari tabel aktivitas dan mahasiswa
    atau model aktivitas dan model mahasiswa.
    -------------------------------------------------------*/
    public function aktivitas()
    {
        return $this->belongsTo(Aktivitas::class, 'aktivitas_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

}
