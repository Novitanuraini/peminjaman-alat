@extends('layouts.app')

@section('title', 'Tambah Alat')
@section('page-title', 'Tambah Alat Baru')

@section('content')
<div class="mb-4">
    <a href="{{ route('tools.index') }}" class="text-decoration-none" style="color: var(--primary);">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h3 class="text-white fw-bold mt-2">Tambah Alat Baru</h3>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="table-card">
            <div class="card-body" style="padding: 30px;">
                <form method="POST" action="{{ route('tools.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Kode Alat <span class="text-danger">*</span></label>
                            <input type="text" name="code" class="form-control form-control-custom" value="{{ old('code') }}" placeholder="Contoh: ELC-001" required>
                            @error('code')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Nama Alat <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-custom" value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Kategori <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select form-select-custom" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->icon }} {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Kondisi <span class="text-danger">*</span></label>
                            <select name="condition" class="form-select form-select-custom" required>
                                <option value="baik" {{ old('condition') == 'baik' ? 'selected' : '' }}>Baik</option>
                                <option value="rusak_ringan" {{ old('condition') == 'rusak_ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                <option value="rusak_berat" {{ old('condition') == 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Stok <span class="text-danger">*</span></label>
                            <input type="number" name="stock" class="form-control form-control-custom" value="{{ old('stock', 0) }}" min="0" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Denda per Hari (Rp) <span class="text-danger">*</span></label>
                            <input type="number" name="daily_fine" class="form-control form-control-custom" value="{{ old('daily_fine', 0) }}" min="0" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Gambar</label>
                            <input type="file" name="image" class="form-control form-control-custom" accept="image/*">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" style="color: var(--text-muted);">Deskripsi</label>
                        <textarea name="description" class="form-control form-control-custom" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('tools.index') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection