@extends('layouts.app')

@section('title', 'Alat')
@section('page-title', 'Manajemen Alat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="text-white fw-bold mb-1">Daftar Alat</h3>
        <p style="color: var(--text-muted);">Kelola semua alat peminjaman</p>
    </div>
    <a href="{{ route('tools.create') }}" class="btn btn-primary-custom">
        <i class="fas fa-plus"></i> Tambah Alat
    </a>
</div>

<div class="table-card">
    <div class="card-body">
        <table class="table table-dark-custom">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Kondisi</th>
                    <th>Denda/Hari</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse(\App\Models\Tool::with('category')->latest()->paginate(10) as $tool)
                <tr>
                    <td><code style="color: var(--primary);">{{ $tool->code }}</code></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <span style="font-size: 20px;">{{ $tool->category->icon ?? '🔧' }}</span>
                            {{ $tool->name }}
                        </div>
                    </td>
                    <td><span class="badge" style="background: rgba(108,92,231,0.2); color: var(--primary);">{{ $tool->category->name }}</span></td>
                    <td>
                        <div>{{ $tool->available_stock }}/{{ $tool->stock }}</div>
                        <div class="progress" style="height: 4px; background: var(--dark-lighter);">
                            <div class="progress-bar" style="background: linear-gradient(90deg, var(--primary), var(--secondary)); width: {{ $tool->stock > 0 ? ($tool->available_stock / $tool->stock * 100) : 0 }}%"></div>
                        </div>
                    </td>
                    <td>
                        <span class="badge {{ $tool->condition === 'baik' ? 'bg-success' : ($tool->condition === 'rusak_ringan' ? 'bg-warning text-dark' : 'bg-danger') }} badge-custom">
                            {{ ucfirst(str_replace('_', ' ', $tool->condition)) }}
                        </span>
                    </td>
                    <td>Rp {{ number_format($tool->daily_fine, 0, ',', '.') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('tools.show', $tool->id) }}" class="btn btn-sm" style="background: rgba(108,92,231,0.2); color: var(--primary); border: none; padding: 5px 10px; border-radius: 8px;">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('tools.edit', $tool->id) }}" class="btn btn-sm" style="background: rgba(253,203,110,0.2); color: #fdcb6e; border: none; padding: 5px 10px; border-radius: 8px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('tools.destroy', $tool->id) }}" style="display: inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm" style="background: rgba(225,112,85,0.2); color: #e17055; border: none; padding: 5px 10px; border-radius: 8px;" onclick="return confirm('Hapus alat ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4" style="color: var(--text-muted);">Belum ada alat</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection