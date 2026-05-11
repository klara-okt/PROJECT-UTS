<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $data = Fasilitas::all();
        return view('fasilitas.index', compact('data'));
    }

    public function create()
    {
        return view('fasilitas.create');
    }

    public function store(Request $request)
    {
        Fasilitas::create($request->all());
        return redirect()->route('fasilitas.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $fasilitas->update($request->all());
        return redirect()->route('fasilitas.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Fasilitas $fasilitas)
    {
        $fasilitas->delete();
        return redirect()->route('fasilitas.index')->with('success', 'Data berhasil dihapus!');
    }
}