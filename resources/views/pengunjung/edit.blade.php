@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=DM+Sans:wght@400;500&display=swap');
    .ep-wrap { padding: 2rem 0; font-family: 'DM Sans', sans-serif; }
    .ep-header { display: flex; align-items: center; gap: 14px; margin-bottom: 2rem; }
    .ep-icon { width: 44px; height: 44px; border-radius: 10px; background: #C9A84C; display: flex; align-items: center; justify-content: center; }
    .ep-title { font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 600; color: #C9A84C; margin: 0; letter-spacing: 1px; }
    .ep-subtitle { font-size: 13px; color: #888; margin: 2px 0 0; }
    .ep-card { background: #fff; border: 0.5px solid #e0e0e0; border-radius: 12px; padding: 1.75rem; }
    .ep-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
    .ep-field { display: flex; flex-direction: column; gap: 6px; }
    .ep-field.full { grid-column: 1 / -1; }
    .ep-label { font-size: 12px; font-weight: 500; color: #888; text-transform: uppercase; letter-spacing: 0.8px; }
    .ep-input {
        background: #f9f9f9; border: 0.5px solid #e0e0e0; border-radius: 8px;
        padding: 10px 14px; font-size: 14px; color: #222;
        font-family: 'DM Sans', sans-serif; transition: border-color 0.15s;
        width: 100%; box-sizing: border-box;
    }
    .ep-input:focus { outline: none; border-color: #C9A84C; box-shadow: 0 0 0 3px rgba(201,168,76,0.12); }
    .ep-prefix { display: flex; align-items: center; background: #f9f9f9; border: 0.5px solid #e0e0e0; border-radius: 8px; overflow: hidden; transition: border-color 0.15s; }
    .ep-prefix:focus-within { border-color: #C9A84C; box-shadow: 0 0 0 3px rgba(201,168,76,0.12); }
    .ep-prefix-label { padding: 10px 12px; font-size: 13px; color: #888; border-right: 0.5px solid #e0e0e0; white-space: nowrap; }
    .ep-prefix input { border: none; background: transparent; padding: 10px 12px; font-size: 14px; color: #222; font-family: 'DM Sans', sans-serif; width: 100%; }
    .ep-prefix input:focus { outline: none; box-shadow: none; }
    .ep-suffix { display: flex; align-items: center; background: #f9f9f9; border: 0.5px solid #e0e0e0; border-radius: 8px; overflow: hidden; transition: border-color 0.15s; }
    .ep-suffix:focus-within { border-color: #C9A84C; box-shadow: 0 0 0 3px rgba(201,168,76,0.12); }
    .ep-suffix input { border: none; background: transparent; padding: 10px 12px; font-size: 14px; color: #222; font-family: 'DM Sans', sans-serif; width: 100%; }
    .ep-suffix input:focus { outline: none; box-shadow: none; }
    .ep-suffix-label { padding: 10px 12px; font-size: 13px; color: #888; border-left: 0.5px solid #e0e0e0; white-space: nowrap; }
    .ep-divider { height: 0.5px; background: #e0e0e0; margin: 1.5rem 0; }
    .ep-actions { display: flex; justify-content: flex-end; gap: 10px; align-items: center; }
    .ep-btn-cancel { background: transparent; border: 0.5px solid #ccc; border-radius: 8px; padding: 9px 20px; font-size: 14px; font-family: 'DM Sans', sans-serif; color: #888; cursor: pointer; transition: background 0.15s; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; }
    .ep-btn-cancel:hover { background: #f5f5f5; color: #888; }
    .ep-btn-submit { background: #C9A84C; border: none; border-radius: 8px; padding: 10px 24px; font-size: 14px; font-weight: 500; font-family: 'DM Sans', sans-serif; color: #fff; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; transition: opacity 0.15s; }
    .ep-btn-submit:hover { opacity: 0.88; }
    .ep-badge { display: inline-flex; align-items: center; gap: 6px; background: rgba(201,168,76,0.1); border: 0.5px solid rgba(201,168,76,0.3); border-radius: 20px; padding: 3px 10px; font-size: 12px; color: #C9A84C; font-weight: 500; margin-bottom: 1.25rem; }
</style>

<div class="ep-wrap">
    <div class="ep-header">
        <div class="ep-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </div>
        <div>
            <p class="ep-title">Edit Pengunjung</p>
            <p class="ep-subtitle">Perbarui data pengunjung</p>
        </div>
    </div>

    <div class="ep-card">
        <div class="ep-badge">✎ Edit Data Pengunjung</div>

        <form action="{{ route('pengunjung.update', $pengunjung->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="ep-grid">

                {{-- Nama --}}
                <div class="ep-field full">
                    <label class="ep-label" for="nama">Nama Lengkap</label>
                    <input class="ep-input" type="text" id="nama" name="nama"
                        placeholder="Masukkan nama pengunjung..."
                        value="{{ old('nama', $pengunjung->nama) }}" required>
                </div>

                {{-- Asal Kota --}}
                <div class="ep-field">
                    <label class="ep-label" for="asal_kota">Asal Kota</label>
                    <input class="ep-input" type="text" id="asal_kota" name="asal_kota"
                        placeholder="Contoh: Surabaya, Jakarta..."
                        value="{{ old('asal_kota', $pengunjung->asal_kota) }}" required>
                </div>

                {{-- No HP --}}
                <div class="ep-field">
                    <label class="ep-label" for="no_hp">No. HP</label>
                    <div class="ep-prefix">
                        <span class="ep-prefix-label">+62</span>
                        <input type="text" id="no_hp" name="no_hp"
                            placeholder="8xx-xxxx-xxxx"
                            value="{{ old('no_hp', $pengunjung->no_hp) }}" required>
                    </div>
                </div>

                {{-- Tanggal Kunjungan --}}
                <div class="ep-field">
                    <label class="ep-label" for="tanggal_kunjungan">Tanggal Kunjungan</label>
                    <input class="ep-input" type="date" id="tanggal_kunjungan" name="tanggal_kunjungan"
                        value="{{ old('tanggal_kunjungan', $pengunjung->tanggal_kunjungan) }}" required>
                </div>

                {{-- Jumlah Orang --}}
                <div class="ep-field">
                    <label class="ep-label" for="jumlah_orang">Jumlah Orang</label>
                    <div class="ep-suffix">
                        <input type="number" id="jumlah_orang" name="jumlah_orang"
                            placeholder="0" min="1"
                            value="{{ old('jumlah_orang', $pengunjung->jumlah_orang) }}" required>
                        <span class="ep-suffix-label">Orang</span>
                    </div>
                </div>

            </div>

            <div class="ep-divider"></div>

            <div class="ep-actions">
                <a href="{{ route('pengunjung.index') }}" class="ep-btn-cancel">← Batal</a>
                <button type="submit" class="ep-btn-submit">✔ Update</button>
            </div>

        </form>
    </div>
</div>

@endsection