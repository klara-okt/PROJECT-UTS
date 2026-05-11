<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index()
    {
    $data = PaketWisata::all();
    return view('paket-wisata.index', compact('data'));
    }

    public function create()
    {
        return view('paket-wisata.create');
    }

    public function store(Request $request)
    {
        PaketWisata::create($request->all());
        return redirect()->route('paket-wisata.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(PaketWisata $paketWisata)
    {
        return view('paket-wisata.edit', compact('paketWisata'));
    }

    public function update(Request $request, PaketWisata $paketWisata)
    {
        $paketWisata->update($request->all());
        return redirect()->route('paket-wisata.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(PaketWisata $paketWisata)
    {
        $paketWisata->delete();
        return redirect()->route('paket-wisata.index')->with('success', 'Data berhasil dihapus!');
    }
}