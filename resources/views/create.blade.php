@extends('layouts.app')

@section('title', 'Tambah Pengguna')
@section('page-title', 'Tambah Pengguna')

@section('content')
<div class="mb-4">
    <a href="{{ route('users.index') }}" class="text-decoration-none" style="color: var(--primary);">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h3 class="text-white fw-bold mt-2">Tambah Pengguna Baru</h3>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="table-card">
            <div class="card-body" style="padding: 30px;">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-custom" value="{{ old('name') }}" required>
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control form-control-custom" value="{{ old('email') }}" required>
                            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control form-control-custom" required>
                            @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Konfirmasi Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control form-control-custom" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Role <span class="text-danger">*</span></label>
                            <select name="role" class="form-select form-select-custom" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                <option value="peminjam" {{ old('role') == 'peminjam' ? 'selected' : '' }}>Peminjam</option>
                            </select>
                            @error('role')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Telepon</label>
                            <input type="text" name="phone" class="form-control form-control-custom" value="{{ old('phone') }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" style="color: var(--text-muted);">Alamat</label>
                        <textarea name="address" class="form-control form-control-custom" rows="3">{{ old('address') }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection