@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="mb-4">
    <h3 class="text-white fw-bold mb-1">Selamat Datang, {{ auth()->user()->name }}! 👋</h3>
    <p style="color: var(--text-muted);">Kelola peminjaman alat dengan mudah</p>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    @if(auth()->user()->role === 'admin')
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(108,92,231,0.15); color: #6c5ce7;">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">{{ \App\Models\User::count() }}</div>
            <div class="stat-label">Total Pengguna</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(0,206,201,0.15); color: #00cec9;">
                <i class="fas fa-tools"></i>
            </div>
            <div class="stat-value">{{ \App\Models\Tool::sum('stock') }}</div>
            <div class="stat-label">Total Alat</div>
        </div>
    </div>
    @endif

    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(253,203,110,0.15); color: #fdcb6e;">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value">{{ \App\Models\Borrowing::where('status', 'pending')->count() }}</div>
            <div class="stat-label">Menunggu Persetujuan</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(0,184,148,0.15); color: #00b894;">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">{{ \App\Models\Borrowing::where('status', 'returned')->count() }}</div>
            <div class="stat-label">Selesai Dikembalikan</div>
        </div>
    </div>
</div>

<!-- Recent Borrowings -->
<div class="table-card">
    <div class="card-header">
        <h5 class="text-white mb-0"><i class="fas fa-exchange-alt me-2" style="color: var(--primary);"></i>Peminjaman Terbaru</h5>
    </div>
    <div class="card-body">
        <table class="table table-dark-custom">
            <thead>
                <tr>
                    <th>Kode</th>
                    @if(auth()->user()->role !== 'peminjam')
                    <th>Peminjam</th>
                    @endif
                    <th>Alat</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $borrowings = auth()->user()->role === 'admin' || auth()->user()->role === 'petugas' 
                        ? \App\Models\Borrowing::with(['user', 'tool'])->latest()->take(5)->get()
                        : \App\Models\Borrowing::with('tool')->where('user_id', auth()->id())->latest()->take(5)->get();
                @endphp
                @forelse($borrowings as $b)
                <tr>
                    <td><code style="color: var(--primary);">{{ $b->borrow_code }}</code></td>
                    @if(auth()->user()->role !== 'peminjam')
                    <td>{{ $b->user->name }}</td>
                    @endif
                    <td>{{ $b->tool->name }}</td>
                    <td>{{ $b->borrow_date->format('d M Y') }}</td>
                    <td>{{ $b->planned_return_date->format('d M Y') }}</td>
                    <td>
                        <span class="badge {{ $b->status === 'pending' ? 'bg-warning text-dark' : ($b->status === 'approved' ? 'bg-info' : ($b->status === 'returned' ? 'bg-success' : 'bg-danger')) }} badge-custom">
                            {{ ucfirst($b->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4" style="color: var(--text-muted);">Belum ada peminjaman</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection