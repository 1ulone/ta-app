<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    //Semua model pada laravel bentukannya gini

    protected $table = 'aktivitas'; //nama tabel pada database
    protected $primaryKey = 'aktivitas_id'; //nama id/primary key tabel

    //isi tabel (kolom yang dapat diisi)
    protected $fillable = [
        'jurusan',
        'judul',
        'start_date',
        'end_date',
        'status',
        'created_by',
    ];


    /*-------------------------------------------------------
    tidak semua model memiliki fungsi ini
    Fungsi ini bertujukan jika tabel memiliki relasi
    contoh dalam tabel ini 'aktivitas_id' memiliki relasi
    pada tabel aktivitas_mahasiswa
    -------------------------------------------------------*/
    public function aktivitasMahasiswa()
    {
        return $this->hasMany(AktivitasMahasiswa::class, $this->primaryKey);
    }
}
