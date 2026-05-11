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

    /* Bahasa tags */
    .ep-tags-wrap { display: flex; flex-wrap: wrap; gap: 6px; padding: 8px 10px; background: #f9f9f9; border: 0.5px solid #e0e0e0; border-radius: 8px; min-height: 44px; align-items: center; cursor: text; transition: border-color 0.15s; }
    .ep-tags-wrap:focus-within { border-color: #C9A84C; box-shadow: 0 0 0 3px rgba(201,168,76,0.12); }
    .ep-tag { display: inline-flex; align-items: center; gap: 5px; background: rgba(201,168,76,0.12); border: 0.5px solid rgba(201,168,76,0.35); border-radius: 20px; padding: 3px 10px; font-size: 13px; color: #7a5f1a; font-family: 'DM Sans', sans-serif; }
    .ep-tag button { background: none; border: none; cursor: pointer; color: #C9A84C; font-size: 14px; padding: 0; line-height: 1; }
    .ep-tags-input { border: none; background: transparent; font-size: 14px; font-family: 'DM Sans', sans-serif; color: #222; outline: none; min-width: 120px; flex: 1; padding: 2px 4px; }
    .ep-tags-hint { font-size: 11px; color: #aaa; margin-top: 4px; }

    .ep-toggle { display: flex; align-items: center; gap: 12px; cursor: pointer; width: fit-content; }
    .ep-toggle-track { width: 44px; height: 24px; border-radius: 12px; background: #ccc; position: relative; transition: background 0.2s; }
    .ep-toggle-track.on { background: #C9A84C; }
    .ep-toggle-thumb { width: 18px; height: 18px; border-radius: 50%; background: #fff; position: absolute; top: 3px; left: 3px; transition: left 0.2s; }
    .ep-toggle-track.on .ep-toggle-thumb { left: 23px; }
    .ep-toggle-label { font-size: 14px; color: #222; }
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
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
        </div>
        <div>
            <p class="ep-title">Tambah Pemandu</p>
            <p class="ep-subtitle">Daftarkan pemandu wisata baru</p>
        </div>
    </div>

    <div class="ep-card">
        <div class="ep-badge">+ Data Pemandu</div>

        <form action="{{ route('pemandu.store') }}" method="POST">
            @csrf

            <div class="ep-grid">

                {{-- Nama --}}
                <div class="ep-field full">
                    <label class="ep-label" for="nama">Nama Pemandu</label>
                    <input class="ep-input" type="text" id="nama" name="nama"
                        placeholder="Masukkan nama lengkap pemandu..."
                        value="{{ old('nama') }}" required>
                </div>

                {{-- Tarif Per Hari --}}
                <div class="ep-field">
                    <label class="ep-label" for="tarif_per_hari">Tarif Per Hari</label>
                    <div class="ep-prefix">
                        <span class="ep-prefix-label">Rp</span>
                        <input type="number" id="tarif_per_hari" name="tarif_per_hari"
                            placeholder="0" min="0"
                            value="{{ old('tarif_per_hari') }}" required>
                    </div>
                </div>

                {{-- Pengalaman --}}
                <div class="ep-field">
                    <label class="ep-label" for="pengalaman_tahun">Pengalaman</label>
                    <div class="ep-suffix">
                        <input type="number" id="pengalaman_tahun" name="pengalaman_tahun"
                            placeholder="0" min="0"
                            value="{{ old('pengalaman_tahun') }}" required>
                        <span class="ep-suffix-label">Tahun</span>
                    </div>
                </div>

                {{-- Bahasa Dikuasai (tag input) --}}
                <div class="ep-field full">
                    <label class="ep-label">Bahasa Dikuasai</label>
                    <div class="ep-tags-wrap" id="tagsWrap" onclick="document.getElementById('bahasaInput').focus()">
                        <span class="ep-tag">Indonesia <button type="button" onclick="removeTag(this)">×</button></span>
                        <input type="text" class="ep-tags-input" id="bahasaInput"
                            placeholder="Ketik bahasa, tekan Enter...">
                    </div>
                    <span class="ep-tags-hint">Tekan Enter untuk menambah bahasa. Contoh: Inggris, Mandarin, Jepang</span>
                    <input type="hidden" name="bahasa_dikuasai" id="bahasaHidden" value="{{ old('bahasa_dikuasai', 'Indonesia') }}">
                </div>

                {{-- Aktif --}}
                <div class="ep-field full">
                    <label class="ep-label">Status Aktif</label>
                    <div class="ep-toggle" onclick="toggleAktif()">
                        <div class="ep-toggle-track on" id="toggleTrack">
                            <div class="ep-toggle-thumb"></div>
                        </div>
                        <span class="ep-toggle-label" id="toggleLabel">Ya — Pemandu aktif bertugas</span>
                        <input type="hidden" name="aktif" id="aktifVal" value="1">
                    </div>
                </div>

            </div>

            <div class="ep-divider"></div>

            <div class="ep-actions">
                <a href="{{ route('pemandu.index') }}" class="ep-btn-cancel">← Batal</a>
                <button type="submit" class="ep-btn-submit">💾 Simpan</button>
            </div>

        </form>
    </div>
</div>

<script>
    // Toggle aktif
    function toggleAktif() {
        const track = document.getElementById('toggleTrack');
        const label = document.getElementById('toggleLabel');
        const val   = document.getElementById('aktifVal');
        const isOn  = track.classList.contains('on');
        if (isOn) {
            track.classList.remove('on');
            label.textContent = 'Tidak — Pemandu tidak aktif';
            val.value = '0';
        } else {
            track.classList.add('on');
            label.textContent = 'Ya — Pemandu aktif bertugas';
            val.value = '1';
        }
    }

    // Tag input bahasa
    const bahasaInput  = document.getElementById('bahasaInput');
    const bahasaHidden = document.getElementById('bahasaHidden');
    const tagsWrap     = document.getElementById('tagsWrap');

    function syncHidden() {
        const tags = tagsWrap.querySelectorAll('.ep-tag');
        bahasaHidden.value = Array.from(tags).map(t => t.textContent.replace('×', '').trim()).join(', ');
    }

    function removeTag(btn) {
        btn.parentElement.remove();
        syncHidden();
    }

    bahasaInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            const val = this.value.trim().replace(',', '');
            if (!val) return;
            const tag = document.createElement('span');
            tag.className = 'ep-tag';
            tag.innerHTML = `${val} <button type="button" onclick="removeTag(this)">×</button>`;
            tagsWrap.insertBefore(tag, bahasaInput);
            this.value = '';
            syncHidden();
        }
        if (e.key === 'Backspace' && this.value === '') {
            const tags = tagsWrap.querySelectorAll('.ep-tag');
            if (tags.length) { tags[tags.length - 1].remove(); syncHidden(); }
        }
    });
</script>

@endsection