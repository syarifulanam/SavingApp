<div class="container-fluid py-5">
    <div class="d-flex align-items-center mb-5 p-4 bg-light rounded-3 shadow-sm">
        <div class="bg-success bg-gradient text-white rounded-circle d-flex justify-content-center align-items-center me-4 shadow-lg"
            style="width: 100px; height: 100px;">
            <i class="bi bi-currency-dollar" style="font-size: 3.5rem;"></i>
        </div>
        <div>
            <h2 class="fw-bold text-success mb-2">Manajemen Tabungan</h2>
            <p class="text-muted mb-0 fs-6">Kelola, pantau, dan perbarui data tabungan nasabah dengan mudah dan efisien
            </p>
        </div>
    </div>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0"><i class="bi bi-journal-text me-2"></i> Daftar Tabungan</h4>
            <a class="btn btn-light btn-sm rounded-pill" href="{{ route('savings.create') }}">
                <i class="bi bi-plus-circle me-1"></i> Tambah Tabungan
            </a>
        </div>

        <div>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-success text-center">
                        <tr>
                            <th>#</th>
                            <th class="text-start">Nama Nasabah</th>
                            <th>Tipe</th>
                            <th class="text-end">Jumlah</th>
                            <th>Tanggal Terakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($savings as $saving)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $saving->nama_nasabah ?? 'Tidak ada' }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge {{ $saving->type === 'income' ? 'bg-success' : 'bg-danger' }} px-3 py-2">
                                        {{ $saving->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                    </span>
                                </td>
                                <td class="text-end fw-semibold text-success">
                                    Rp {{ number_format($saving->amount, 0, ',', '.') }}
                                </td>
                                <td class="text-center">{{ optional($saving->updated_at)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('savings.edit', $saving->id) }}"
                                        class="btn btn-warning btn-sm rounded-pill">Edit</a>

                                    <button type="button" wire:click="setDelete({{ $saving->id }})"
                                        class="btn btn-danger btn-sm rounded-pill px-3">
                                        <i class="bi bi-trash me-1"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox fs-4 mb-2"></i><br>
                                    Belum ada data tabungan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Modal Hapus Satu -->
            <div class="modal fade @if ($showDeleteModal) show d-block @endif" tabindex="-1"
                @if ($showDeleteModal) style="background-color: rgba(0,0,0,0.5);" @endif wire:ignore.self>
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 shadow-lg border-0">
                        <div class="modal-header bg-danger text-white rounded-top-4">
                            <h5 class="modal-title">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus
                            </h5>
                            <button type="button" class="btn-close btn-close-white"
                                wire:click="$set('showDeleteModal', false)"></button>
                        </div>
                        <div class="modal-body text-center">
                            <p class="fs-6 mb-0">Apakah kamu yakin ingin menghapus data tabungan
                                <strong>{{ $selectedSavingName }}</strong>?
                            </p>
                            <p class="text-muted small">Tindakan ini tidak dapat dibatalkan.</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4"
                                wire:click="$set('showDeleteModal', false)">
                                Batal
                            </button>
                            <button wire:click="destroy" wire:loading.attr="disabled"
                                class="btn btn-danger rounded-pill px-4">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
