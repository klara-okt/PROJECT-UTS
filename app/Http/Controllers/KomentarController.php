<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        $data = Komentar::all();
        return view('komentar.index', compact('data'));
    }

    public function create()
    {
        return view('komentar.create');
    }

    public function store(Request $request)
    {
        Komentar::create($request->all());
        return redirect()->route('komentar.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Komentar $komentar)
    {
        return view('komentar.edit', compact('komentar'));
    }

    public function update(Request $request, Komentar $komentar)
    {
        $komentar->update($request->all());
        return redirect()->route('komentar.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Komentar $komentar)
    {
        $komentar->delete();
        return redirect()->route('komentar.index')->with('success', 'Data berhasil dihapus!');
    }
}