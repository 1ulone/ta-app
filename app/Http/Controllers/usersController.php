<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usersController extends Controller
{
    public function index()
    {
        $koordinator = User::where('role', 'koordinator')->get();
        return view('koordinator.index', compact('koordinator'));
    }

    // Menampilkan detail koordinator
    public function show($id)
    {
        $koordinator = User::findOrFail($id);
        return view('koordinator.show', compact('koordinator'));
    }
}
