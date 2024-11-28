<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Jadwal;
use App\Models\Penguji;
use App\Models\Mahasiswa; 
use Illuminate\Http\Request;

class nilaiController extends Controller
{
    /**
     * Tampilkan daftar nilai beserta relasi jadwal, penguji, dan mahasiswa.
     */
    public function index()
    {
        // Ambil semua data nilai dengan relasi
        $nilai = Nilai::with(['jadwal', 'penguji', 'mahasiswa'])->get();
    
        // Data lain untuk form
        $jadwal = Jadwal::all();
        $penguji = Penguji::all();
        $mahasiswa = Mahasiswa::all(); // Ambil data mahasiswa berdasarkan ID
    
        return view('dashboard.nilai', compact('nilai', 'jadwal', 'penguji', 'mahasiswa'));
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jadwal_id' => 'required|integer',
            'penguji_id' => 'required|integer',
            'mahasiswa_id' => 'required|integer', // Validasi mahasiswa_id
            'jumlah' => 'required|numeric|min:0|max:100',
            'catatan' => 'nullable|string',
        ]);
    
        // Simpan nilai
        Nilai::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'jadwal_id' => $request->jadwal_id,
            'penguji_id' => $request->penguji_id,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
        ]);
    
        return redirect()->route('dashboard.nilai.index')->with('success', 'Nilai berhasil ditambahkan.');
    }
    
}
