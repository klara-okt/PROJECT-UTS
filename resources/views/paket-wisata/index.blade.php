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
    <h2>Data Paket Wisata</h2>
    <a href="{{ route('paket-wisata.create') }}" class="btn btn-success">+ Tambah</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama Paket</th>
            <th>Durasi (Jam)</th>
            <th>Harga</th>
            <th>Min Peserta</th>
            <th>Aktif</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->nama_paket }}</td>
            <td>{{ $item->durasi_jam }}</td>
            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
            <td>{{ $item->min_peserta }}</td>
            <td>{{ $item->aktif ? 'Ya' : 'Tidak' }}</td>
            <td>
                <a href="{{ route('paket-wisata.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('paket-wisata.destroy', $item->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection