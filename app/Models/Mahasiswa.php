<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //Semua model pada laravel bentukannya gini

    protected $table = 'mahasiswa'; //nama tabel pada database
    protected $primaryKey = 'mahasiswa_id'; //nama id/primary key tabel

    //isi tabel (kolom yang dapat diisi)
    protected $fillable = ['user_id', 'NIM', 'jurusan', 'aktif_semester' ];


    /*-------------------------------------------------------
    Tidak semua model memiliki fungsi ini
    Fungsi ini bertujukan jika tabel memiliki relasi
    contoh dalam tabel ini 'mahasiswa_id' memiliki relasi
    pada tabel aktivitas_mahasiswa
    -------------------------------------------------------*/
    public function aktivitasMahasiswa()
    {
        return $this->hasMany(AktivitasMahasiswa::class, $this->primaryKey);
    }

    public function aktivitasList()
    {
        return $this->hasManyThrough(Aktivitas::class, AktivitasMahasiswa::class, 'mahasiswa_id', 'aktivitas_id', 'mahasiswa_id', 'aktivitas_id');
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

}
