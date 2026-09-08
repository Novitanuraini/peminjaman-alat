@extends('layouts.app')

@section('title', 'Eskalaber - Peminjaman Alat')

@section('content')
<style>
    .hero-section {
        min-height: 100vh;
        background: linear-gradient(135deg, #0a0a1a 0%, #1a1a3e 100%);
        display: flex;
        align-items: center;
        padding-top: 80px;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.2;
    }

    .gradient-text {
        background: linear-gradient(135deg, #6c5ce7, #00cec9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn-hero {
        padding: 14px 32px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 16px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-hero-primary {
        background: linear-gradient(135deg, #6c5ce7, #5a4bd1);
        color: white;
    }

    .btn-hero-outline {
        border: 2px solid rgba(108,92,231,0.5);
        color: #6c5ce7;
        background: transparent;
    }

    .feature-card {
        background: rgba(18,18,42,0.8);
        border: 1px solid rgba(108,92,231,0.15);
        border-radius: 16px;
        padding: 30px;
        transition: all 0.3s;
        height: 100%;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        border-color: rgba(108,92,231,0.4);
    }

    .navbar-landing {
        background: rgba(10,10,26,0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(108,92,231,0.15);
        padding: 15px 0;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }
</style>

<!-- Navbar -->
<nav class="navbar-landing">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div style="width:40px;height:40px;background:linear-gradient(135deg,#6c5ce7,#00cec9);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:800;color:white;font-size:18px;">E</div>
                <h5 class="text-white mb-0 fw-bold">Eskalaber</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                @auth
                <a href="{{ route('dashboard') }}" class="btn btn-hero btn-hero-primary btn-sm">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-hero btn-hero-outline btn-sm">Login</a>
                <a href="{{ route('register') }}" class="btn btn-hero btn-hero-primary btn-sm">Daftar</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="mb-3">
                    <span class="badge" style="background:rgba(108,92,231,0.2);color:#6c5ce7;padding:8px 16px;border-radius:20px;">
                        <i class="fas fa-rocket me-1"></i> Sistem Peminjaman Alat Modern
                    </span>
                </div>
                <h1 class="hero-title text-white mb-3">
                    Kelola Peminjaman<br>
                    <span class="gradient-text">Alat Dengan Mudah</span>
                </h1>
                <p class="lead" style="color: var(--text-muted); max-width: 500px;">
                    Platform digital untuk mengelola peminjaman dan pengembalian alat secara efisien dan terorganisir.
                </p>
                <div class="d-flex gap-3 mt-4">
                    @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-hero btn-hero-primary">
                        <i class="fas fa-th-large"></i> Dashboard
                    </a>
                    @else
                    <a href="{{ route('register') }}" class="btn btn-hero btn-hero-primary">
                        <i class="fas fa-user-plus"></i> Mulai Sekarang
                    </a>
                    @endauth
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div style="font-size: 150px; opacity: 0.8;">🛠️</div>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section style="padding: 80px 0; background: var(--dark);">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-white fw-bold">Fitur Unggulan</h2>
            <p style="color: var(--text-muted);">Semua yang Anda butuhkan untuk manajemen alat</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div style="font-size: 48px; margin-bottom: 20px;">👥</div>
                    <h5 class="text-white">3 Level User</h5>
                    <p style="color: var(--text-muted);">Admin, Petugas, dan Peminjam dengan hak akses berbeda</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div style="font-size: 48px; margin-bottom: 20px;">🔄</div>
                    <h5 class="text-white">Alur Otomatis</h5>
                    <p style="color: var(--text-muted);">Pengajuan, persetujuan, dan pengembalian terstruktur</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div style="font-size: 48px; margin-bottom: 20px;">📊</div>
                    <h5 class="text-white">Laporan Lengkap</h5>
                    <p style="color: var(--text-muted);">Dashboard dan laporan peminjaman yang detail</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection