<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index()
    {
        $data = Pengunjung::all();
        return view('pengunjung.index', compact('data'));
    }

    public function create()
    {
        return view('pengunjung.create');
    }

    public function store(Request $request)
    {
        Pengunjung::create($request->all());
        return redirect()->route('pengunjung.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Pengunjung $pengunjung)
    {
        return view('pengunjung.edit', compact('pengunjung'));
    }

    public function update(Request $request, Pengunjung $pengunjung)
    {
        $pengunjung->update($request->all());
        return redirect()->route('pengunjung.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Pengunjung $pengunjung)
    {
        $pengunjung->delete();
        return redirect()->route('pengunjung.index')->with('success', 'Data berhasil dihapus!');
    }
}