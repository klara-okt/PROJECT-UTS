@extends('layouts.app')

@section('content')

<style>
    .hero-section {
        text-align: center;
        padding: 60px 0 40px;
    }
    .hero-label {
        font-family: 'Trebuchet MS', sans-serif;
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #95D5B2;
        margin-bottom: 12px;
    }
    .hero-title {
        font-family: 'Georgia', serif;
        color: white;
        font-weight: 700;
        font-size: 3.2rem;
        line-height: 1.2;
        text-shadow: 0 4px 24px rgba(0,0,0,0.6);
        letter-spacing: 1px;
        margin-bottom: 0;
    }
    .hero-divider {
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, transparent, #C9A84C, transparent);
        margin: 20px auto 0;
    }

    .menu-card {
        background: #fff;
        border: none !important;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.18);
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        height: 100%;
    }
    .menu-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, #1B4332, #52B788, #C9A84C);
    }
    .menu-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 60px rgba(0,0,0,0.28) !important;
    }
    .menu-card .card-body {
        padding: 36px 24px 28px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        height: 100%;
    }
    .menu-card .icon-wrap {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, #D8F3DC, #B7E4C7);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 1.8rem;
    }
    .menu-card .card-title {
        font-family: 'Georgia', serif;
        color: #1B4332;
        font-weight: 700;
        font-size: 1.3rem;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }
    .menu-card .card-text {
        font-family: 'Trebuchet MS', sans-serif;
        color: #718096;
        font-size: 0.85rem;
        margin-bottom: 24px;
    }
</style>

<div class="hero-section">
    <p class="hero-label">Selamat Datang</p>
    <h1 class="hero-title">Sistem Wisata Desa</h1>
    <div class="hero-divider"></div>
</div>

<div class="row justify-content-center g-4 pb-5 align-items-stretch">
    <div class="col-md-4">
        <div class="card menu-card text-center">
            <div class="card-body">
                <div class="icon-wrap">🏞️</div>
                <h5 class="card-title">Paket Wisata</h5>
                <p class="card-text">Kelola paket wisata desa</p>
                <a href="{{ route('paket-wisata.index') }}" class="btn btn-success">Lihat Data</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card menu-card text-center">
            <div class="card-body">
                <div class="icon-wrap">👥</div>
                <h5 class="card-title">Pengunjung</h5>
                <p class="card-text">Kelola data pengunjung</p>
                <a href="{{ route('pengunjung.index') }}" class="btn btn-success">Lihat Data</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card menu-card text-center">
            <div class="card-body">
                <div class="icon-wrap">🧭</div>
                <h5 class="card-title">Pemandu</h5>
                <p class="card-text">Kelola data pemandu wisata</p>
                <a href="{{ route('pemandu.index') }}" class="btn btn-success">Lihat Data</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card menu-card text-center">
            <div class="card-body">
                <div class="icon-wrap">🏠</div>
                <h5 class="card-title">Fasilitas</h5>
                <p class="card-text">Kelola data fasilitas desa</p>
                <a href="{{ route('fasilitas.index') }}" class="btn btn-success">Lihat Data</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card menu-card text-center">
            <div class="card-body">
                <div class="icon-wrap">💬</div>
                <h5 class="card-title">Komentar</h5>
                <p class="card-text">Kelola komentar pengunjung</p>
                <a href="{{ route('komentar.index') }}" class="btn btn-success">Lihat Data</a>
            </div>
        </div>
    </div>
</div>

@endsection