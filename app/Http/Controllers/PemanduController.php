<?php

namespace App\Http\Controllers;

use App\Models\Pemandu;
use Illuminate\Http\Request;

class PemanduController extends Controller
{
    public function index()
    {
        $data = Pemandu::all();
        return view('pemandu.index', compact('data'));
    }

    public function create()
    {
        return view('pemandu.create');
    }

    public function store(Request $request)
    {
        Pemandu::create($request->all());
        return redirect()->route('pemandu.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Pemandu $pemandu)
    {
        return view('pemandu.edit', compact('pemandu'));
    }

    public function update(Request $request, Pemandu $pemandu)
    {
        $pemandu->update($request->all());
        return redirect()->route('pemandu.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Pemandu $pemandu)
    {
        $pemandu->delete();
        return redirect()->route('pemandu.index')->with('success', 'Data berhasil dihapus!');
    }
}