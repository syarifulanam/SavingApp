<div class="container-fluid py-5">

    <div class="d-flex align-items-center mb-5 p-4 bg-light rounded-3 shadow-sm">
        <div class="bg-success bg-gradient text-white rounded-circle d-flex justify-content-center align-items-center me-4 shadow-lg"
            style="width: 90px; height: 90px;">
            <i class="bi bi-currency-dollar" style="font-size: 3.2rem;"></i>
        </div>
        <div>
            <h2 class="fw-bold text-success mb-2">Tambah Tabungan</h2>
            <p class="text-muted mb-0 fs-6">Isi data tabungan nasabah dengan lengkap dan akurat</p>
        </div>
    </div>

    <div class="card shadow-lg border-0 rounded-3 mx-auto" style="max-width: 700px;">
        <div class="card-header bg-success text-white text-center py-3">
            <h4 class="mb-0">Form Tambah Tabungan</h4>
        </div>
        <div class="card-body p-4">

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form wire:submit.prevent="save" novalidate>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Nasabah</label>
                    <input type="text" class="form-control rounded-pill @error('nama_nasabah') is-invalid @enderror"
                        wire:model.defer="nama_nasabah" placeholder="Masukkan nama nasabah">
                    @error('nama_nasabah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tipe Tabungan</label>
                    <select class="form-select rounded-pill @error('type') is-invalid @enderror"
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
                    <input type="number" class="form-control rounded-pill @error('amount') is-invalid @enderror"
                        wire:model.defer="amount" placeholder="Masukkan jumlah tabungan">
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" class="form-control rounded-pill @error('date') is-invalid @enderror"
                        wire:model.defer="date">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('savings.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success rounded-pill px-4">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
