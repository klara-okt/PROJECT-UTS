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
    .ep-input, .ep-textarea {
        background: #f9f9f9; border: 0.5px solid #e0e0e0; border-radius: 8px;
        padding: 10px 14px; font-size: 14px; color: #222;
        font-family: 'DM Sans', sans-serif; transition: border-color 0.15s;
        width: 100%; box-sizing: border-box;
    }
    .ep-input:focus, .ep-textarea:focus { outline: none; border-color: #C9A84C; box-shadow: 0 0 0 3px rgba(201,168,76,0.12); }
    .ep-textarea { resize: vertical; min-height: 110px; line-height: 1.6; }

    /* Star rating */
    .ep-stars { display: flex; flex-direction: row-reverse; gap: 4px; width: fit-content; }
    .ep-stars input[type="radio"] { display: none; }
    .ep-stars label {
        font-size: 28px; color: #ddd; cursor: pointer;
        transition: color 0.15s; line-height: 1;
    }
    .ep-stars input:checked ~ label,
    .ep-stars label:hover,
    .ep-stars label:hover ~ label { color: #C9A84C; }
    .ep-rating-note { font-size: 12px; color: #888; margin-top: 4px; }
    .ep-rating-val { font-weight: 500; color: #C9A84C; }

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
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
            </svg>
        </div>
        <div>
            <p class="ep-title">Tambah Komentar</p>
            <p class="ep-subtitle">Catat ulasan pengunjung</p>
        </div>
    </div>

    <div class="ep-card">
        <div class="ep-badge">+ Data Komentar</div>

        <form action="{{ route('komentar.store') }}" method="POST">
            @csrf

            <div class="ep-grid">

                {{-- Nama Pengunjung --}}
                <div class="ep-field full">
                    <label class="ep-label" for="nama_pengunjung">Nama Pengunjung</label>
                    <input class="ep-input" type="text" id="nama_pengunjung" name="nama_pengunjung"
                        placeholder="Masukkan nama pengunjung..."
                        value="{{ old('nama_pengunjung') }}" required>
                </div>

                {{-- Tanggal Ulasan --}}
                <div class="ep-field">
                    <label class="ep-label" for="tanggal_ulasan">Tanggal Ulasan</label>
                    <input class="ep-input" type="date" id="tanggal_ulasan" name="tanggal_ulasan"
                        value="{{ old('tanggal_ulasan', date('Y-m-d')) }}" required>
                </div>

                {{-- Rating Bintang --}}
                <div class="ep-field">
                    <label class="ep-label">Rating</label>
                    <div class="ep-stars">
                        @for ($i = 5; $i >= 1; $i--)
                            <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}"
                                {{ old('rating') == $i ? 'checked' : ($i == 5 ? 'checked' : '') }}>
                            <label for="star{{ $i }}">★</label>
                        @endfor
                    </div>
                    <span class="ep-rating-note">Pilih <span class="ep-rating-val" id="ratingText">5</span> bintang</span>
                    {{-- Hidden input untuk nilai desimal jika dibutuhkan --}}
                    {{-- Ganti dengan input number biasa jika rating desimal diperlukan: --}}
                    {{-- <input class="ep-input" type="number" name="rating" min="1" max="5" step="0.1" value="{{ old('rating') }}" required> --}}
                </div>

                {{-- Komentar --}}
                <div class="ep-field full">
                    <label class="ep-label" for="komentar">Komentar</label>
                    <textarea class="ep-textarea" id="komentar" name="komentar"
                        placeholder="Tulis ulasan pengunjung di sini..." required>{{ old('komentar') }}</textarea>
                </div>

            </div>

            <div class="ep-divider"></div>

            <div class="ep-actions">
                <a href="{{ route('komentar.index') }}" class="ep-btn-cancel">← Batal</a>
                <button type="submit" class="ep-btn-submit">💾 Simpan</button>
            </div>

        </form>
    </div>
</div>

<script>
    const stars = document.querySelectorAll('.ep-stars input[type="radio"]');
    const ratingText = document.getElementById('ratingText');
    stars.forEach(star => {
        star.addEventListener('change', () => {
            ratingText.textContent = star.value;
        });
    });
</script>

@endsection