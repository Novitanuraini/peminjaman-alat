@extends('layouts.app')

@section('title', 'Detail Peminjaman')
@section('page-title', 'Detail Peminjaman')

@section('content')
<div class="mb-4">
    <a href="{{ route('borrowings.index') }}" class="text-decoration-none" style="color: var(--primary);">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h3 class="text-white fw-bold mt-2">{{ $borrowing->borrow_code }}</h3>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="table-card">
            <div class="card-header">
                <h5 class="text-white mb-0"><i class="fas fa-info-circle me-2" style="color: var(--primary);"></i>Informasi Peminjaman</h5>
            </div>
            <div class="card-body" style="padding: 30px;">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <small style="color: var(--text-muted);">Kode Peminjaman</small>
                        <div style="color: white; font-weight: 600;">{{ $borrowing->borrow_code }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <small style="color: var(--text-muted);">Peminjam</small>
                        <div style="color: white; font-weight: 600;">{{ $borrowing->user->name }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <small style="color: var(--text-muted);">Alat</small>
                        <div style="color: white; font-weight: 600;">{{ $borrowing->tool->name }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <small style="color: var(--text-muted);">Jumlah</small>
                        <div style="color: white; font-weight: 600;">{{ $borrowing->quantity }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <small style="color: var(--text-muted);">Tanggal Pinjam</small>
                        <div style="color: white; font-weight: 600;">{{ $borrowing->borrow_date->format('d M Y') }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <small style="color: var(--text-muted);">Rencana Kembali</small>
                        <div style="color: white; font-weight: 600;">{{ $borrowing->planned_return_date->format('d M Y') }}</div>
                    </div>
                    @if($borrowing->actual_return_date)
                    <div class="col-md-6 mb-3">
                        <small style="color: var(--text-muted);">Tanggal Dikembalikan</small>
                        <div style="color: var(--success); font-weight: 600;">{{ $borrowing->actual_return_date->format('d M Y') }}</div>
                    </div>
                    @endif
                    @if($borrowing->fine > 0)
                    <div class="col-md-6 mb-3">
                        <small style="color: var(--text-muted);">Denda</small>
                        <div style="color: var(--danger); font-weight: 600;">Rp {{ number_format($borrowing->fine, 0, ',', '.') }}</div>
                    </div>
                    @endif
                    @if($borrowing->notes)
                    <div class="col-12 mb-3">
                        <small style="color: var(--text-muted);">Catatan</small>
                        <div style="color: white;">{{ $borrowing->notes }}</div>
                    </div>
                    @endif
                    @if($borrowing->rejection_reason)
                    <div class="col-12 mb-3">
                        <small style="color: var(--text-muted);">Alasan Penolakan</small>
                        <div style="color: var(--danger);">{{ $borrowing->rejection_reason }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="table-card">
            <div class="card-body text-center" style="padding: 30px;">
                <h6 class="text-white mb-3">Status</h6>
                <span class="badge {{ $borrowing->status === 'pending' ? 'bg-warning text-dark' : ($borrowing->status === 'approved' || $borrowing->status === 'borrowed' ? 'bg-info' : ($borrowing->status === 'returned' ? 'bg-success' : 'bg-danger')) }} badge-custom" style="font-size: 16px; padding: 10px 20px;">
                    {{ ucfirst($borrowing->status) }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection