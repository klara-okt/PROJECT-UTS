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
    <h2>Data Komentar</h2>
    <a href="{{ route('komentar.create') }}" class="btn btn-success">+ Tambah</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama Pengunjung</th>
            <th>Rating</th>
            <th>Tanggal Ulasan</th>
            <th>Komentar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->nama_pengunjung }}</td>
            <td>⭐ {{ $item->rating }}</td>
            <td>{{ $item->tanggal_ulasan }}</td>
            <td>{{ $item->komentar }}</td>
            <td>
                <a href="{{ route('komentar.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('komentar.destroy', $item->id) }}" method="POST" style="display:inline">
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