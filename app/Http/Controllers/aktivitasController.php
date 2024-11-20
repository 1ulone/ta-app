<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class aktivitasController extends Controller
{
    /*--------------------------------------------------------------------
    disini 1 fungsi (function) digunain buat 1 view
    misal butuh dimana di dashboard mahasiswa ngeliatin jadwal
    aktivitas, terus di dashboard dosen juga ngeliatin
    jadwal aktivitas, 2 dashboard itu punya fungsi (function) nya sendiri
    contoh:
    --------------------------------------------------------------------*/
    public function mahasiswa_index()
    {
        //Melakukan relasi antar tabel mahasiswa, aktivitas,
        //dan aktivitas_mahasiswa
        $aktivitas = Mahasiswa::with('aktivitasList')->get();
        return view('dashboard.aktivitas', ['aktivitas' => $aktivitas]);
    }
}
