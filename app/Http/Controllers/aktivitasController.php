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
    public function jadwalMahasiswa()
    {
        $jadwal = Aktivitas::where('role', 'mahasiswa')->get();
        return view('mahasiswa.dashboard', compact('jadwal'));
    }

    // Menampilkan jadwal aktivitas di dashboard dosen
    public function jadwalDosen()
    {
        $jadwal = Aktivitas::where('role', 'dosen')->get();
        return view('dosen.dashboard', compact('jadwal'));
    }
}
