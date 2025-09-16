<div class="container-fluid py-5">
    <div class="d-flex align-items-center mb-5 p-4 bg-light rounded-3 shadow-sm">
        <div class="bg-success bg-gradient text-white rounded-circle d-flex justify-content-center align-items-center me-4 shadow-lg"
            style="width: 90px; height: 90px;">
            <i class="bi bi-pencil-square" style="font-size: 3.5rem;"></i>
        </div>
        <div>
            <h2 class="fw-bold text-success mb-2">Edit Tabungan</h2>
            <p class="text-muted mb-0 fs-6">Perbarui data tabungan nasabah dengan benar</p>
        </div>
    </div>

    <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 720px;">
        <div class="card-header bg-success bg-gradient text-white text-center py-3 rounded-top-4">
            <h4 class="mb-0"><i class="bi bi-journal-text me-2"></i> Form Edit Tabungan</h4>
        </div>
        <div class="card-body p-4">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif

            <form wire:submit.prevent="update" novalidate>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Nasabah</label>
                    <input type="text" class="form-control rounded-pill" wire:model.defer="nama_nasabah">
                    @error('nama_nasabah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tipe Tabungan</label>
                    <select class="form-select rounded-pill shadow-sm @error('type') is-invalid @enderror"
                        wire:model.defer="type">
                        <option value="">-- Pilih Tipe --</option>
                        <option value="income">Pemasukan</option>
                        <option value="expense">Pengeluaran</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jumlah</label>
                    <input type="number"
                        class="form-control rounded-pill shadow-sm @error('amount') is-invalid @enderror"
                        wire:model.defer="amount" placeholder="Masukkan jumlah tabungan">
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date"
                        class="form-control rounded-pill shadow-sm @error('date') is-invalid @enderror"
                        wire:model.defer="date">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('savings.index') }}"
                        class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
                        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success bg-gradient rounded-pill px-4 shadow-sm">
                        <i class="bi bi-check2-circle me-1"></i> Update
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
