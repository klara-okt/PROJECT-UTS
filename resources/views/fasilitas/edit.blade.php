@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=DM+Sans:wght@400;500&display=swap');
    .ef-wrap { padding: 2rem 0; font-family: 'DM Sans', sans-serif; }
    .ef-header { display: flex; align-items: center; gap: 14px; margin-bottom: 2rem; }
    .ef-icon { width: 44px; height: 44px; border-radius: 10px; background: #C9A84C; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .ef-title { font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 600; color: #C9A84C; margin: 0; letter-spacing: 1px; }
    .ef-subtitle { font-size: 13px; color: #888; margin: 2px 0 0; }
    .ef-card { background: #fff; border: 0.5px solid #e0e0e0; border-radius: 12px; padding: 1.75rem; }
    .ef-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
    .ef-field { display: flex; flex-direction: column; gap: 6px; }
    .ef-field.full { grid-column: 1 / -1; }
    .ef-label { font-size: 12px; font-weight: 500; color: #888; text-transform: uppercase; letter-spacing: 0.8px; }
    .ef-input {
        background: #f9f9f9; border: 0.5px solid #e0e0e0; border-radius: 8px;
        padding: 10px 14px; font-size: 14px; color: #222;
        font-family: 'DM Sans', sans-serif; transition: border-color 0.15s;
        width: 100%; box-sizing: border-box;
    }
    .ef-input:focus { outline: none; border-color: #C9A84C; box-shadow: 0 0 0 3px rgba(201,168,76,0.12); }
    .ef-prefix { display: flex; align-items: center; background: #f9f9f9; border: 0.5px solid #e0e0e0; border-radius: 8px; overflow: hidden; transition: border-color 0.15s; }
    .ef-prefix:focus-within { border-color: #C9A84C; box-shadow: 0 0 0 3px rgba(201,168,76,0.12); }
    .ef-prefix-label { padding: 10px 12px; font-size: 13px; color: #888; border-right: 0.5px solid #e0e0e0; white-space: nowrap; }
    .ef-prefix input { border: none; background: transparent; padding: 10px 12px; font-size: 14px; color: #222; font-family: 'DM Sans', sans-serif; width: 100%; }
    .ef-prefix input:focus { outline: none; box-shadow: none; }
    .ef-suffix { display: flex; align-items: center; background: #f9f9f9; border: 0.5px solid #e0e0e0; border-radius: 8px; overflow: hidden; transition: border-color 0.15s; }
    .ef-suffix:focus-within { border-color: #C9A84C; box-shadow: 0 0 0 3px rgba(201,168,76,0.12); }
    .ef-suffix input { border: none; background: transparent; padding: 10px 12px; font-size: 14px; color: #222; font-family: 'DM Sans', sans-serif; width: 100%; }
    .ef-suffix input:focus { outline: none; box-shadow: none; }
    .ef-suffix-label { padding: 10px 12px; font-size: 13px; color: #888; border-left: 0.5px solid #e0e0e0; white-space: nowrap; }
    .ef-pill-group { display: flex; gap: 8px; flex-wrap: wrap; }
    .ef-pill { padding: 7px 18px; border-radius: 20px; font-size: 13px; font-family: 'DM Sans', sans-serif; border: 0.5px solid #e0e0e0; background: #f9f9f9; color: #888; cursor: pointer; transition: all 0.15s; user-select: none; }
    .ef-pill:hover { border-color: #C9A84C; color: #C9A84C; }
    .ef-pill.selected { background: #C9A84C; border-color: #C9A84C; color: #fff; font-weight: 500; }
    .ef-pill.rusak.selected { background: #e05555; border-color: #e05555; }
    .ef-pill.perbaikan.selected { background: #e0923a; border-color: #e0923a; }
    .ef-toggle { display: flex; align-items: center; gap: 12px; cursor: pointer; width: fit-content; }
    .ef-toggle-track { width: 44px; height: 24px; border-radius: 12px; background: #ccc; position: relative; transition: background 0.2s; }
    .ef-toggle-track.on { background: #C9A84C; }
    .ef-toggle-thumb { width: 18px; height: 18px; border-radius: 50%; background: #fff; position: absolute; top: 3px; left: 3px; transition: left 0.2s; }
    .ef-toggle-track.on .ef-toggle-thumb { left: 23px; }
    .ef-toggle-label { font-size: 14px; color: #222; }
    .ef-divider { height: 0.5px; background: #e0e0e0; margin: 1.5rem 0; }
    .ef-actions { display: flex; justify-content: flex-end; gap: 10px; align-items: center; }
    .ef-btn-cancel { background: transparent; border: 0.5px solid #ccc; border-radius: 8px; padding: 9px 20px; font-size: 14px; font-family: 'DM Sans', sans-serif; color: #888; cursor: pointer; transition: background 0.15s; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; }
    .ef-btn-cancel:hover { background: #f5f5f5; color: #888; }
    .ef-btn-submit { background: #C9A84C; border: none; border-radius: 8px; padding: 10px 24px; font-size: 14px; font-weight: 500; font-family: 'DM Sans', sans-serif; color: #fff; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; transition: opacity 0.15s; }
    .ef-btn-submit:hover { opacity: 0.88; }
    .ef-badge { display: inline-flex; align-items: center; gap: 6px; background: rgba(201,168,76,0.1); border: 0.5px solid rgba(201,168,76,0.3); border-radius: 20px; padding: 3px 10px; font-size: 12px; color: #C9A84C; font-weight: 500; margin-bottom: 1.25rem; }
</style>

<div class="ef-wrap">
    <div class="ef-header">
        <div class="ef-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/>
            </svg>
        </div>
        <div>
            <p class="ef-title">Edit Fasilitas</p>
            <p class="ef-subtitle">Perbarui data fasilitas wisata</p>
        </div>
    </div>

    <div class="ef-card">
        <div class="ef-badge">✎ Edit Data Fasilitas</div>

        <form action="{{ route('fasilitas.update', $fasilitas) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="ef-grid">

                {{-- Nama --}}
                <div class="ef-field full">
                    <label class="ef-label" for="nama">Nama Fasilitas</label>
                    <input class="ef-input" type="text" id="nama" name="nama"
                        placeholder="Contoh: Kolam Renang, Gazebo..."
                        value="{{ old('nama', $fasilitas->nama) }}" required>
                </div>

                {{-- Kapasitas --}}
                <div class="ef-field">
                    <label class="ef-label" for="kapasitas">Kapasitas</label>
                    <div class="ef-suffix">
                        <input type="number" id="kapasitas" name="kapasitas"
                            placeholder="0" min="1"
                            value="{{ old('kapasitas', $fasilitas->kapasitas) }}" required>
                        <span class="ef-suffix-label">Orang</span>
                    </div>
                </div>

                {{-- Biaya Sewa --}}
                <div class="ef-field">
                    <label class="ef-label" for="biaya_sewa">Biaya Sewa</label>
                    <div class="ef-prefix">
                        <span class="ef-prefix-label">Rp</span>
                        <input type="number" id="biaya_sewa" name="biaya_sewa"
                            placeholder="0" min="0"
                            value="{{ old('biaya_sewa', $fasilitas->biaya_sewa) }}" required>
                    </div>
                </div>

                {{-- Kondisi --}}
                <div class="ef-field full">
                    <label class="ef-label">Kondisi</label>
                    <div class="ef-pill-group" id="kondisiGroup">
                        @foreach(['baik' => '✔ Baik', 'rusak' => '✖ Rusak', 'perbaikan' => '⚙ Perbaikan'] as $val => $label)
                            <span class="ef-pill {{ $val }} {{ old('kondisi', $fasilitas->kondisi) === $val ? 'selected' : '' }}"
                                  data-val="{{ $val }}">{{ $label }}</span>
                        @endforeach
                    </div>
                    <input type="hidden" name="kondisi" id="kondisiVal"
                           value="{{ old('kondisi', $fasilitas->kondisi) }}">
                </div>

                {{-- Tersedia --}}
                <div class="ef-field full">
                    <label class="ef-label">Tersedia</label>
                    <div class="ef-toggle" onclick="toggleTersedia()">
                        <div class="ef-toggle-track {{ $fasilitas->tersedia ? 'on' : '' }}" id="toggleTrack">
                            <div class="ef-toggle-thumb"></div>
                        </div>
                        <span class="ef-toggle-label" id="toggleLabel">
                            {{ $fasilitas->tersedia ? 'Ya — Fasilitas tersedia' : 'Tidak — Fasilitas tidak tersedia' }}
                        </span>
                        <input type="hidden" name="tersedia" id="tersediaVal"
                               value="{{ $fasilitas->tersedia ? '1' : '0' }}">
                    </div>
                </div>

            </div>

            <div class="ef-divider"></div>

            <div class="ef-actions">
                <a href="{{ route('fasilitas.index') }}" class="ef-btn-cancel">← Batal</a>
                <button type="submit" class="ef-btn-submit">✔ Update</button>
            </div>

        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.ef-pill').forEach(pill => {
        pill.addEventListener('click', () => {
            document.querySelectorAll('.ef-pill').forEach(p => p.classList.remove('selected'));
            pill.classList.add('selected');
            document.getElementById('kondisiVal').value = pill.dataset.val;
        });
    });

    function toggleTersedia() {
        const track = document.getElementById('toggleTrack');
        const label = document.getElementById('toggleLabel');
        const val   = document.getElementById('tersediaVal');
        const isOn  = track.classList.contains('on');
        if (isOn) {
            track.classList.remove('on');
            label.textContent = 'Tidak — Fasilitas tidak tersedia';
            val.value = '0';
        } else {
            track.classList.add('on');
            label.textContent = 'Ya — Fasilitas tersedia';
            val.value = '1';
        }
    }
</script>

@endsection