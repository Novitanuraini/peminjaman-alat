@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    .auth-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #0a0a1a 0%, #1a1a3e 100%);
        padding: 20px;
    }

    .auth-card {
        background: var(--dark-card);
        border: 1px solid rgba(108, 92, 231, 0.2);
        border-radius: 20px;
        padding: 40px;
        width: 100%;
        max-width: 450px;
    }

    .auth-logo {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #6c5ce7, #00cec9);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: 800;
        color: white;
        margin: 0 auto 20px;
    }
</style>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-logo">E</div>
        <h3 class="text-white text-center fw-bold mb-2">Selamat Datang Kembali</h3>
        <p class="text-center mb-4" style="color: var(--text-muted);">Login ke akun Anda</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-3">
                <label class="form-label" style="color: var(--text-muted);">Email</label>
                <input type="email" name="email" class="form-control form-control-custom @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" style="color: var(--text-muted);">Password</label>
                <input type="password" name="password" class="form-control form-control-custom @error('password') is-invalid @enderror" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" style="color: var(--text-muted);" for="remember">Ingat Saya</label>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 mb-3">
                <i class="fas fa-sign-in-alt me-2"></i> Login
            </button>

            <p class="text-center mb-0" style="color: var(--text-muted);">
                Belum punya akun? <a href="{{ route('register') }}" style="color: var(--primary);">Daftar</a>
            </p>
        </form>

        <div class="mt-4 p-3 rounded" style="background: rgba(108,92,231,0.1); border: 1px solid rgba(108,92,231,0.2);">
            <small style="color: var(--text-muted);">
                <strong>Demo Akun:</strong><br>
                Admin: admin@eskalaber.com / admin123<br>
                Petugas: petugas@eskalaber.com / petugas123<br>
                Peminjam: peminjam@eskalaber.com / peminjam123
            </small>
        </div>
    </div>
</div>
@endsection