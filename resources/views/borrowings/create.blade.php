@extends('layouts.app')

@section('title', 'Ajukan Peminjaman')
@section('page-title', 'Ajukan Peminjaman')

@section('content')
<div class="mb-4">
    <a href="{{ route('borrowings.index') }}" class="text-decoration-none" style="color: var(--primary);">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h3 class="text-white fw-bold mt-2">Form Peminjaman Alat</h3>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="table-card">
            <div class="card-body" style="padding: 30px;">
                <form method="POST" action="{{ route('borrowings.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" style="color: var(--text-muted);">Pilih Alat <span class="text-danger">*</span></label>
                        <select name="tool_id" class="form-select form-select-custom" required>
                            <option value="">-- Pilih Alat --</option>
                            @foreach(\App\Models\Tool::where('is_active', true)->where('available_stock', '>', 0)->get() as $tool)
                            <option value="{{ $tool->id }}">
                                {{ $tool->code }} - {{ $tool->name }} (Stok: {{ $tool->available_stock }})
                            </option>
                            @endforeach
                        </select>
                        @error('tool_id')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Jumlah <span class="text-danger">*</span></label>
                            <input type="number" name="quantity" class="form-control form-control-custom" min="1" value="1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="color: var(--text-muted);">Tanggal Pinjam <span class="text-danger">*</span></label>
                            <input type="date" name="borrow_date" class="form-control form-control-custom" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="color: var(--text-muted);">Tanggal Rencana Kembali <span class="text-danger">*</span></label>
                        <input type="date" name="planned_return_date" class="form-control form-control-custom" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" style="color: var(--text-muted);">Catatan (Opsional)</label>
                        <textarea name="notes" class="form-control form-control-custom" rows="3" placeholder="Tambahan catatan...">{{ old('notes') }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-paper-plane"></i> Ajukan Peminjaman
                        </button>
                        <a href="{{ route('borrowings.index') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="table-card">
            <div class="card-body" style="padding: 20px;">
                <h6 class="text-white mb-3"><i class="fas fa-info-circle me-2" style="color: var(--primary);"></i>Informasi</h6>
                <div class="mb-3">
                    <small style="color: var(--text-muted);">Status Pengajuan:</small><br>
                    <span class="badge bg-warning text-dark badge-custom">Menunggu Persetujuan</span>
                </div>
                <hr style="border-color: rgba(108,92,231,0.2);">
                <div class="mb-3">
                    <small style="color: var(--text-muted);">Proses:</small><br>
                    <ol style="color: var(--text-light); font-size: 13px; padding-left: 20px; margin: 5px 0;">
                        <li>Ajukan peminjaman</li>
                        <li>Petugas menyetujui</li>
                        <li>Ambil alat</li>
                        <li>Kembalikan tepat waktu</li>
                    </ol>
                </div>
                <hr style="border-color: rgba(108,92,231,0.2);">
                <div>
                    <small style="color: var(--text-muted);">Denda:</small><br>
                    <small style="color: var(--warning);">Dihitung otomatis jika terlambat</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection