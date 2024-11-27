<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Jadwal; // Pastikan Jadwal model diimpor
use App\Models\Penguji; // Pastikan Penguji model diimpor
use Illuminate\Http\Request;

class nilaiController extends Controller
{
    /**
     * Tampilkan daftar nilai beserta relasi jadwal dan penguji.
     */
    public function index()
    {
        $nilai = Nilai::all(); // Ambil semua data nilai
        $jadwal = Jadwal::all(); // Ambil semua data jadwal
        $penguji = Penguji::all(); // Ambil semua data penguji

        // Kirim data ke view
        return view('dashboard.nilai', compact('nilai', 'jadwal', 'penguji'));
    }

    /**
     * Simpan nilai baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jadwal_id' => 'required|integer',
            'penguji_id' => 'required|integer',
            'jumlah' => 'required|numeric|min:0|max:100',
            'catatan' => 'nullable|string',
        ]);

        // Simpan data ke database
        Nilai::create($request->all());

        // Redirect setelah berhasil menyimpan data
        return redirect()->route('dashboard.nilai.index')->with('success', 'Nilai berhasil ditambahkan.');
    }

    /**
     * Update data nilai.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'jadwal_id' => 'required|integer',
            'penguji_id' => 'required|integer',
            'jumlah' => 'required|numeric|min:0|max:100',
            'catatan' => 'nullable|string',
        ]);

        // Cari data nilai dan update
        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());

        // Redirect setelah berhasil memperbarui data
        return redirect()->route('dashboard.nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    /**
     * Hapus data nilai.
     */
    public function destroy($id)
    {
        // Cari nilai berdasarkan ID dan hapus
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        // Redirect setelah berhasil menghapus data
        return redirect()->route('dashboard.nilai.index')->with('success', 'Nilai berhasil dihapus.');
    }
}
