<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Desa</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        :root {
            --primary:      #2D6A4F;
            --primary-dark: #1B4332;
            --primary-light:#52B788;
            --accent:       #95D5B2;
            --gold:         #C9A84C;
        }

        * { box-sizing: border-box; }

        body {
        background-image: url("https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?w=1920&q=100");
         background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(90deg, #0d2b1e 0%, #1B4332 60%, #0d2b1e 100%) !important;
            border-bottom: 2px solid var(--gold);
            box-shadow: 0 4px 24px rgba(0,0,0,0.5);
            padding: 14px 0;
        }
        .navbar-brand {
            font-family: 'Georgia', serif;
            font-weight: 700;
            font-size: 1.6rem;
            color: var(--gold) !important;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .nav-link {
            font-family: 'Trebuchet MS', sans-serif;
            color: rgba(255,255,255,0.8) !important;
            font-weight: 400;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            transition: color 0.2s;
            position: relative;
            padding: 6px 16px !important;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0; left: 50%; right: 50%;
            height: 1px;
            background: var(--gold);
            transition: left 0.3s, right 0.3s;
        }
        .nav-link:hover { color: var(--gold) !important; }
        .nav-link:hover::after { left: 16px; right: 16px; }

        .container.mt-4 {
            background: transparent;
            border: none;
            box-shadow: none;
            padding: 28px;
        }

        .btn-success {
            font-family: 'Trebuchet MS', sans-serif;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
            border: none !important;
            font-weight: 500;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 10px 28px;
            border-radius: 2px;
            transition: all 0.25s;
        }
        .btn-success:hover {
            background: linear-gradient(135deg, var(--primary-dark), #0d2b1e) !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(27,67,50,0.5);
        }

        .alert-success {
            background-color: #D8F3DC;
            border-left: 4px solid var(--primary);
            border-radius: 4px;
            color: var(--primary-dark);
        }

        .table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .table thead {
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            color: white;
        }
        .table thead th {
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 0.8rem;
            border: none;
            padding: 14px 16px;
        }
        .table tbody tr {
            transition: background 0.15s;
        }
        .table tbody tr:hover {
            background-color: rgba(149, 213, 178, 0.15);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Wisata Desa</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('paket-wisata.index') }}">Paket Wisata</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pengunjung.index') }}">Pengunjung</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pemandu.index') }}">Pemandu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('fasilitas.index') }}">Fasilitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('komentar.index') }}">Komentar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>