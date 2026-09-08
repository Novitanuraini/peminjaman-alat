@extends('layouts.app')

@section('title', 'Kategori')
@section('page-title', 'Manajemen Kategori')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="text-white fw-bold mb-1">Kategori Alat</h3>
        <p style="color: var(--text-muted);">Kelola kategori alat</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn btn-primary-custom">
        <i class="fas fa-plus"></i> Tambah Kategori
    </a>
</div>

<div class="row g-4">
    @forelse(\App\Models\Category::withCount('tools')->latest()->get() as $category)
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div style="font-size: 40px;">{{ $category->icon ?? '📁' }}</div>
                <div class="d-flex gap-1">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm" style="background: rgba(253,203,110,0.2); color: #fdcb6e; border: none; padding: 5px 10px; border-radius: 8px;">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display: inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm" style="background: rgba(225,112,85,0.2); color: #e17055; border: none; padding: 5px 10px; border-radius: 8px;" onclick="return confirm('Hapus kategori ini?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            <h5 class="text-white fw-bold mb-1">{{ $category->name }}</h5>
            <p style="color: var(--text-muted); font-size: 13px; margin-bottom: 15px;">{{ $category->description ?? 'Tidak ada deskripsi' }}</p>
            <div class="d-flex justify-content-between align-items-center" style="border-top: 1px solid rgba(108,92,231,0.15); padding-top: 12px;">
                <span style="font-size: 13px; color: var(--text-muted);">{{ $category->tools_count }} alat</span>
                <a href="{{ route('tools.index', ['category' => $category->id]) }}" style="color: var(--primary); font-size: 13px; text-decoration: none;">
                    Lihat Alat <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <div style="font-size: 60px; margin-bottom: 20px;">📁</div>
        <h5 class="text-white">Belum Ada Kategori</h5>
        <p style="color: var(--text-muted);">Tambahkan kategori pertama Anda</p>
    </div>
    @endforelse
</div>
@endsection