<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Peminjaman Alat Eskalaber')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #6c5ce7;
            --secondary: #00cec9;
            --dark: #0a0a1a;
            --dark-card: #12122a;
            --dark-lighter: #1a1a3e;
            --text-light: #e0e0ff;
            --text-muted: #8888aa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--dark);
            color: var(--text-light);
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: var(--dark-card);
            border-right: 1px solid rgba(108, 92, 231, 0.2);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
        }

        .sidebar-brand {
            padding: 20px;
            border-bottom: 1px solid rgba(108, 92, 231, 0.2);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand .logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 18px;
            color: white;
        }

        .sidebar-menu { padding: 15px 0; }
        
        .sidebar-menu .menu-label {
            padding: 10px 20px 5px;
            font-size: 11px;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--text-muted);
            text-decoration: none;
            transition: all 0.3s;
            gap: 12px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            color: white;
            background: rgba(108, 92, 231, 0.1);
            border-left: 3px solid var(--primary);
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        .top-navbar {
            background: var(--dark-card);
            border-bottom: 1px solid rgba(108, 92, 231, 0.2);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-area { padding: 30px; }

        .stat-card {
            background: var(--dark-card);
            border: 1px solid rgba(108, 92, 231, 0.15);
            border-radius: 16px;
            padding: 24px;
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(108, 92, 231, 0.4);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 800;
            color: white;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 13px;
            color: var(--text-muted);
        }

        .table-card {
            background: var(--dark-card);
            border: 1px solid rgba(108, 92, 231, 0.15);
            border-radius: 16px;
            overflow: hidden;
        }

        .table-card .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(108, 92, 231, 0.15);
            padding: 20px 24px;
        }

        .table-dark-custom {
            margin: 0;
            color: var(--text-light);
        }

        .table-dark-custom thead th {
            background: var(--dark-lighter);
            border: none;
            padding: 14px 20px;
            font-size: 12px;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .table-dark-custom tbody td {
            border-color: rgba(108, 92, 231, 0.1);
            padding: 14px 20px;
        }

        .table-dark-custom tbody tr:hover {
            background: rgba(108, 92, 231, 0.05);
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary), #5a4bd1);
            border: none;
            color: white;
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(108, 92, 231, 0.4);
            color: white;
        }

        .form-control-custom,
        .form-select-custom {
            background: var(--dark-lighter);
            border: 1px solid rgba(108, 92, 231, 0.3);
            color: var(--text-light);
            padding: 12px 16px;
            border-radius: 10px;
        }

        .form-control-custom:focus,
        .form-select-custom:focus {
            background: var(--dark-lighter);
            border-color: var(--primary);
            color: var(--text-light);
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.1);
        }

        .badge-custom {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), #fd79a8);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .alert-custom {
            border-radius: 12px;
            border: none;
        }
    </style>
    @yield('styles')
</head>
<body>
    @auth
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-brand">
            <div class="logo">E</div>
            <div>
                <h5 class="text-white mb-0">Eskalaber</h5>
                <small style="color: var(--text-muted); font-size: 11px;">Peminjaman Alat</small>
            </div>
        </div>
        <div class="sidebar-menu">
            <div class="menu-label">Menu Utama</div>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>

            @if(auth()->user()->role === 'admin')
            <div class="menu-label">Manajemen</div>
            <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Pengguna
            </a>
            <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <i class="fas fa-folder"></i> Kategori
            </a>
            <a href="{{ route('tools.index') }}" class="{{ request()->routeIs('tools.*') ? 'active' : '' }}">
                <i class="fas fa-tools"></i> Alat
            </a>
            @endif

            <div class="menu-label">Peminjaman</div>
            <a href="{{ route('borrowings.index') }}" class="{{ request()->routeIs('borrowings.*') ? 'active' : '' }}">
                <i class="fas fa-exchange-alt"></i> Peminjaman
            </a>
            @if(auth()->user()->role === 'peminjam')
            <a href="{{ route('borrowings.create') }}" class="{{ request()->routeIs('borrowings.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle"></i> Ajukan Peminjaman
            </a>
            @endif
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <h4 class="text-white mb-0">@yield('page-title', 'Dashboard')</h4>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end">
                    <h6 class="text-white mb-0">{{ auth()->user()->name }}</h6>
                    <small style="color: var(--text-muted);">
                        <span class="badge {{ auth()->user()->role === 'admin' ? 'bg-danger' : (auth()->user()->role === 'petugas' ? 'bg-warning text-dark' : 'bg-success') }} badge-custom">
                            {{ ucfirst(auth()->user()->role) }}
                        </span>
                    </small>
                </div>
                <div class="user-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Content -->
        <div class="content-area">
            @if(session('success'))
            <div class="alert alert-success alert-custom">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-custom">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            </div>
            @endif

            @yield('content')
        </div>
    </div>
    @else
    @yield('content')
    @endauth

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>