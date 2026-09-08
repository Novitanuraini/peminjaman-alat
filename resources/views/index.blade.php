@extends('layouts.app')

@section('title', 'Manajemen Pengguna')
@section('page-title', 'Manajemen Pengguna')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="text-white fw-bold mb-1">Daftar Pengguna</h3>
        <p style="color: var(--text-muted);">Kelola semua pengguna sistem</p>
    </div>
    <a href="{{ route('users.create') }}" class="btn btn-primary-custom">
        <i class="fas fa-plus"></i> Tambah User
    </a>
</div>

<div class="table-card">
    <div class="card-body">
        <table class="table table-dark-custom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse(\App\Models\User::latest()->paginate(10) as $i => $user)
                <tr>
                    <td>{{ $i + 1 + ($user->currentPage() - 1) * 10 }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="user-avatar" style="width: 32px; height: 32px; font-size: 12px;">{{ substr($user->name, 0, 1) }}</div>
                            {{ $user->name }}
                        </div>
                    </td>
                    <td style="color: var(--text-muted);">{{ $user->email }}</td>
                    <td>
                        <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : ($user->role === 'petugas' ? 'bg-warning text-dark' : 'bg-success') }} badge-custom">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td style="color: var(--text-muted);">{{ $user->phone ?? '-' }}</td>
                    <td>
                        @if($user->is_active)
                        <span class="badge bg-success badge-custom">Aktif</span>
                        @else
                        <span class="badge bg-danger badge-custom">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm" style="background: rgba(253,203,110,0.2); color: #fdcb6e; border: none; padding: 5px 10px; border-radius: 8px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if($user->id !== auth()->id())
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm" style="background: rgba(225,112,85,0.2); color: #e17055; border: none; padding: 5px 10px; border-radius: 8px;" onclick="return confirm('Hapus user ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4" style="color: var(--text-muted);">Belum ada pengguna</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection