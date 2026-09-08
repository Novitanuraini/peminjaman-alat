@extends('layouts.app')

@section('title', 'Edit Pengguna')
@section('page-title', 'Edit Pengguna')

@section('content')
<div class="mb-4">
    <a href="{{ route('users.index') }}" class="text-decoration-none" style="color: var(--primary);">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h3 class="text-white fw-bold mt-2">Edit Pengguna: {{ $user->name }}</h3>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="table-card">
            <div class="card-body" style="padding: 30px;">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-custom" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control form-control-custom" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Password (kosongkan jika tidak diubah)</label>
                            <input type="password" name="password" class="form-control form-control-custom">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Role <span class="text-danger">*</span></label>
                            <select name="role" class="form-select form-select-custom" required>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                <option value="peminjam" {{ old('role', $user->role) == 'peminjam' ? 'selected' : '' }}>Peminjam</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Telepon</label>
                            <input type="text" name="phone" class="form-control form-control-custom" value="{{ old('phone', $user->phone) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Status</label>
                            <select name="is_active" class="form-select form-select-custom">
                                <option value="1" {{ old('is_active', $user->is_active) ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ !old('is_active', $user->is_active) ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" style="color: var(--text-muted);">Alamat</label>
                        <textarea name="address" class="form-control form-control-custom" rows="3">{{ old('address', $user->address) }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-save"></i> Update
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection