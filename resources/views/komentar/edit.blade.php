@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=DM+Sans:wght@400;500&display=swap');
    .ek-wrap { padding: 2rem 0; font-family: 'DM Sans', sans-serif; }
    .ek-header { display: flex; align-items: center; gap: 14px; margin-bottom: 2rem; }
    .ek-icon { width: 44px; height: 44px; border-radius: 10px; background: #C9A84C; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .ek-title { font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 600; color: #C9A84C; margin: 0; letter-spacing: 1px; }
    .ek-subtitle { font-size: 13px; color: #888; margin: 2px 0 0; }
    .ek-card { background: #fff; border: 0.5px solid #e0e0e0; border-radius: 12px; padding: 1.75rem; }
    .ek-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
    .ek-field { display: flex; flex-direction: column; gap: 6px; }
    .ek-field.full { grid-column: 1 / -1; }
    .ek-label { font-size: 12px; font-weight: 500; color: #888; text-transform: uppercase; letter-spacing: 0.8px; }
    .ek-input {
        background: #f9f9f9; border: 0.5px solid #e0e0e0; border-radius: 8px;
        padding: 10px 14px; font-size: 14px; color: #222;
        font-family: 'DM Sans', sans-serif; transition: border-color 0.15s;
        width: 100%; box-sizing: border-box;
    }
    .ek-input:focus { outline: none; border-color: #C9A84C; box-shadow: 0 0 0 3px rgba(201,168,76,0.12); }
    textarea.ek-input { resize: vertical; min-height: 110px; }
    .ek-stars { display: flex; gap: 6px; align-items: center; padding: 6px 0; }
    .ek-star { font-size: 26px; cursor: pointer; color: #ddd; transition: color 0.15s, transform 0.1s; user-select: none; }
    .ek-star.active { color: #C9A84C; }
    .ek-star:hover { transform: scale(1.15); }
    .ek-rating-hint { font-size: 12px; color: #aaa; margin-left: 8px; }
    .ek-divider { height: 0.5px; background: #e0e0e0; margin: 1.5rem 0; }
    .ek-actions { display: flex; justify-content: flex-end; gap: 10px; align-items: center; }
    .ek-btn-cancel { background: transparent; border: 0.5px solid #ccc; border-radius: 8px; padding: 9px 20px; font-size: 14px; font-family: 'DM Sans', sans-serif; color: #888; cursor: pointer; transition: background 0.15s; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; }
    .ek-btn-cancel:hover { background: #f5f5f5; color: #888; }
    .ek-btn-submit { background: #C9A84C; border: none; border-radius: 8px; padding: 10px 24px; font-size: 14px; font-weight: 500; font-family: 'DM Sans', sans-serif; color: #fff; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; transition: opacity 0.15s; }
    .ek-btn-submit:hover { opacity: 0.88; }
    .ek-badge { display: inline-flex; align-items: center; gap: 6px; background: rgba(201,168,76,0.1); border: 0.5px solid rgba(201,168,76,0.3); border-radius: 20px; padding: 3px 10px; font-size: 12px; color: #C9A84C; font-weight: 500; margin-bottom: 1.25rem; }
</style>

<div class="ek-wrap">
    <div class="ek-header">
        <div class="ek-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
            </svg>
        </div>
        <div>
            <p class="ek-title">Edit Komentar</p>
            <p class="ek-subtitle">Perbarui ulasan pengunjung</p>
        </div>
    </div>

    <div class="ek-card">
        <div class="ek-badge">✎ Edit Data Komentar</div>

        <form action="{{ route('komentar.update', $komentar->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="ek-grid">

                {{-- Nama Pengunjung --}}
                <div class="ek-field full">
                    <label class="ek-label" for="nama_pengunjung">Nama Pengunjung</label>
                    <input class="ek-input" type="text" id="nama_pengunjung" name="nama_pengunjung"
                        placeholder="Contoh: Budi Santoso"
                        value="{{ old('nama_pengunjung', $komentar->nama_pengunjung) }}" required>
                </div>

                {{-- Rating (Bintang Interaktif) --}}
                <div class="ek-field full">
                    <label class="ek-label">Rating</label>
                    <div style="display:flex; align-items:center; gap:4px; flex-wrap:wrap;">
                        <div class="ek-stars" id="starContainer">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="ek-star {{ $i <= old('rating', $komentar->rating) ? 'active' : '' }}"
                                      data-val="{{ $i }}">★</span>
                            @endfor
                        </div>
                        <span class="ek-rating-hint" id="ratingHint">
                            {{ old('rating', $komentar->rating) }} / 5
                        </span>
                        <input type="hidden" name="rating" id="ratingVal"
                               value="{{ old('rating', $komentar->rating) }}">
                    </div>
                </div>

                {{-- Tanggal Ulasan --}}
                <div class="ek-field">
                    <label class="ek-label" for="tanggal_ulasan">Tanggal Ulasan</label>
                    <input class="ek-input" type="date" id="tanggal_ulasan" name="tanggal_ulasan"
                        value="{{ old('tanggal_ulasan', $komentar->tanggal_ulasan) }}" required>
                </div>

                {{-- Komentar --}}
                <div class="ek-field full">
                    <label class="ek-label" for="komentar">Komentar</label>
                    <textarea class="ek-input" id="komentar" name="komentar" rows="4" required>{{ old('komentar', $komentar->komentar) }}</textarea>
                </div>

            </div>

            <div class="ek-divider"></div>

            <div class="ek-actions">
                <a href="{{ route('komentar.index') }}" class="ek-btn-cancel">← Batal</a>
                <button type="submit" class="ek-btn-submit">✔ Update</button>
            </div>

        </form>
    </div>
</div>

<script>
    const stars = document.querySelectorAll('.ek-star');
    const ratingHint = document.getElementById('ratingHint');
    const ratingVal = document.getElementById('ratingVal');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const val = parseInt(star.dataset.val);
            ratingVal.value = val;
            ratingHint.textContent = val + ' / 5';
            stars.forEach(s => s.classList.toggle('active', parseInt(s.dataset.val) <= val));
        });
        star.addEventListener('mouseenter', () => {
            const val = parseInt(star.dataset.val);
            stars.forEach(s => s.style.color = parseInt(s.dataset.val) <= val ? '#C9A84C' : '#ddd');
        });
    });
    document.getElementById('starContainer').addEventListener('mouseleave', () => {
        const cur = parseInt(ratingVal.value);
        stars.forEach(s => s.style.color = parseInt(s.dataset.val) <= cur ? '#C9A84C' : '#ddd');
    });
</script>

@endsection