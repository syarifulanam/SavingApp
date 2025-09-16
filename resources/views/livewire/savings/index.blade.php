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
            <a class="btn btn-light btn-sm rounded-pill" href="{{ url('/savings/create') }}">
                <i class="bi bi-plus-circle me-1"></i> Tambah Tabungan
            </a>
        </div>

        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <div>{{ session('message') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-success text-center">
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th class="text-start">Nama Nasabah</th>
                            <th style="width: 15%;">Tipe</th>
                            <th style="width: 15%;" class="text-end">Jumlah</th>
                            <th style="width: 15%;">Tanggal Terakhir</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($savings as $saving)
                            <tr wire:key="{{ $saving->id }}">
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
                                    <a href="{{ url('/savings/' . $saving->id . '/edit') }}"
                                        class="btn btn-warning btn-sm rounded-pill">
                                        Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger rounded-pill px-3"
                                        wire:click="delete({{ $saving->id }})"
                                        onclick="confirm('Yakin ingin menghapus?') || event.stopImmediatePropagation()">
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

        </div>
    </div>

</div>
