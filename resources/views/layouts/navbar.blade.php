<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #1a2e1a;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <span class="text-white">WISATA</span> <span class="text-success">DESA</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('destinasi*') ? 'active' : '' }}" href="{{ route('destinasi.index') }}">Paket Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pengunjung*') ? 'active' : '' }}" href="{{ route('pengunjung.index') }}">Pengunjung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pemandu*') ? 'active' : '' }}" href="{{ route('pemandu.index') }}">Pemandu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('fasilitas*') ? 'active' : '' }}" href="#">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('komentar*') ? 'active' : '' }}" href="{{ route('komentar.index') }}">Komentar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        font-size: 0.9rem;
        margin: 0 5px;
        transition: 0.3s;
    }
    .nav-link:hover {
        color: #28a745 !important;
    }
    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: white !important;
    }
</style>