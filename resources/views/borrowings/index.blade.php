@extends('layouts.app')

@section('title', 'Peminjaman')
@section('page-title', 'Data Peminjaman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="text-white fw-bold mb-1">Peminjaman Alat</h3>
        <p style="color: var(--text-muted);">Kelola semua data peminjaman</p>
    </div>
    @if(auth()->user()->role === 'peminjam')
    <a href="{{ route('borrowings.create') }}" class="btn btn-primary-custom">
        <i class="fas fa-plus"></i> Ajukan Peminjaman
    </a>
    @endif
</div>

<div class="table-card">
    <div class="card-body">
        <table class="table table-dark-custom">
            <thead>
                <tr>
                    <th>Kode</th>
                    @if(auth()->user()->role !== 'peminjam')
                    <th>Peminjam</th>
                    @endif
                    <th>Alat</th>
                    <th>Jumlah</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                    <th>Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    if(auth()->user()->role === 'admin' || auth()->user()->role === 'petugas') {
                        $borrowings = \App\Models\Borrowing::with(['user', 'tool'])->latest()->paginate(10);
                    } else {
                        $borrowings = \App\Models\Borrowing::with('tool')->where('user_id', auth()->id())->latest()->paginate(10);
                    }
                @endphp
                @forelse($borrowings as $b)
                <tr>
                    <td><code style="color: var(--primary);">{{ $b->borrow_code }}</code></td>
                    @if(auth()->user()->role !== 'peminjam')
                    <td>{{ $b->user->name }}</td>
                    @endif
                    <td>{{ $b->tool->name }}</td>
                    <td>{{ $b->quantity }}</td>
                    <td>{{ $b->borrow_date->format('d M Y') }}</td>
                    <td>{{ $b->planned_return_date->format('d M Y') }}</td>
                    <td>
                        <span class="badge {{ $b->status === 'pending' ? 'bg-warning text-dark' : ($b->status === 'approved' || $b->status === 'borrowed' ? 'bg-info' : ($b->status === 'returned' ? 'bg-success' : 'bg-danger')) }} badge-custom">
                            {{ ucfirst($b->status) }}
                        </span>
                    </td>
                    <td>{{ $b->fine > 0 ? 'Rp ' . number_format($b->fine, 0, ',', '.') : '-' }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('borrowings.show', $b->id) }}" class="btn btn-sm" style="background: rgba(108,92,231,0.2); color: var(--primary); border: none; padding: 5px 10px; border-radius: 8px;">
                                <i class="fas fa-eye"></i>
                            </a>

                            @if(auth()->user()->role !== 'peminjam' && $b->status === 'pending')
                            <form method="POST" action="{{ route('borrowings.approve', $b->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm" style="background: rgba(0,184,148,0.2); color: #00b894; border: none; padding: 5px 10px; border-radius: 8px;" onclick="return confirm('Setujui peminjaman ini?')">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            @endif

                            @if(in_array($b->status, ['approved', 'borrowed']))
                            <form method="POST" action="{{ route('borrowings.return', $b->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm" style="background: rgba(116,185,255,0.2); color: #74b9ff; border: none; padding: 5px 10px; border-radius: 8px;" onclick="return confirm('Proses pengembalian?')">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-4" style="color: var(--text-muted);">Belum ada peminjaman</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection