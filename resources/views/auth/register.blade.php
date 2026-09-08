@extends('layouts.app')

@section('title', 'Register')

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
        max-width: 500px;
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
        <h3 class="text-white text-center fw-bold mb-2">Daftar Akun</h3>
        <p class="text-center mb-4" style="color: var(--text-muted);">Buat akun baru</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="mb-3">
                <label class="form-label" style="color: var(--text-muted);">Nama Lengkap</label>
                <input type="text" name="name" class="form-control form-control-custom @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label" style="color: var(--text-muted);">Email</label>
                <input type="email" name="email" class="form-control form-control-custom @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label" style="color: var(--text-muted);">Password</label>
                <input type="password" name="password" class="form-control form-control-custom @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label" style="color: var(--text-muted);">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control form-control-custom" required>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 mb-3">
                <i class="fas fa-user-plus me-2"></i> Daftar
            </button>

            <p class="text-center mb-0" style="color: var(--text-muted);">
                Sudah punya akun? <a href="{{ route('login') }}" style="color: var(--primary);">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection