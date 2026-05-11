@extends('layouts.app')

@section('content')

<style>
    h2 {
        color: #C9A84C;
        font-family: 'Georgia', serif;
        font-weight: 500;
        letter-spacing: 2px;
        text-transform: uppercase;
        text-shadow: 0 2px 8px rgba(0,0,0,0.5);
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Pengunjung</h2>
    <a href="{{ route('pengunjung.create') }}" class="btn btn-success">+ Tambah</a>
</div>

@if(count($data) == 0)
<div class="alert alert-info">Belum ada data pengunjung.</div>
@else
<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Asal Kota</th>
            <th>No HP</th>
            <th>Tanggal Kunjungan</th>
            <th>Jumlah Orang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->asal_kota }}</td>
            <td>{{ $item->no_hp }}</td>
            <td>{{ $item->tanggal_kunjungan }}</td>
            <td>{{ $item->jumlah_orang }}</td>
            <td>
                <a href="{{ route('pengunjung.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pengunjung.destroy', $item->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection