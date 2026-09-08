@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('page-title', 'Tambah Kategori')

@section('content')
<div class="mb-4">
    <a href="{{ route('categories.index') }}" class="text-decoration-none" style="color: var(--primary);">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h3 class="text-white fw-bold mt-2">Tambah Kategori Baru</h3>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="table-card">
            <div class="card-body" style="padding: 30px;">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" style="color: var(--text-muted);">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control form-control-custom" value="{{ old('name') }}" required>
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="color: var(--text-muted);">Icon (Emoji)</label>
                        <input type="text" name="icon" class="form-control form-control-custom" value="{{ old('icon') }}" placeholder="Contoh: 🔧">
                        <small style="color: var(--text-muted);">Gunakan emoji atau ikon teks</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" style="color: var(--text-muted);">Deskripsi</label>
                        <textarea name="description" class="form-control form-control-custom" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection