<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;

class dokumenController extends Controller
{
    public function show($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        return view('dokumen.show', compact('dokumen'));
    }

    // Menambahkan dokumen
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $dokumen = new Dokumen();
        $dokumen->nama_dokumen = $request->nama_dokumen;
        $dokumen->file = $request->file('file')->store('dokumen');
        $dokumen->save();

        return redirect()->back()->with('success', 'Dokumen berhasil ditambahkan.');
    }
}
