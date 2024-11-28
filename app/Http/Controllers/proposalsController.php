<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposals;

class proposalsController extends Controller
{
    public function formUpload()
    {
        return view('proposal.upload');
    }

    // Menyimpan proposal yang di-upload
    public function upload(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file_proposal' => 'required|file|mimes:pdf|max:2048',
        ]);

        $proposal = new Proposals();
        $proposal->judul = $request->judul;
        $proposal->file_proposal = $request->file('file_proposal')->store('proposals');
        $proposal->mahasiswa_id = auth()->user()->id; // Asumsi mahasiswa sedang login
        $proposal->save();

        return redirect()->back()->with('success', 'Proposal berhasil diupload.');
    }

    // Review proposal oleh koordinator
    public function review($id)
    {
        $proposal = Proposals::findOrFail($id);
        return view('proposal.review', compact('proposal'));
    }
}
