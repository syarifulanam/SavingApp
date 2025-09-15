<div class="container-fluid py-5">

    <div class="d-flex align-items-center mb-5 p-4 bg-light rounded-3 shadow-sm">
        <div class="bg-success bg-gradient text-white rounded-circle d-flex justify-content-center align-items-center me-4 shadow-lg"
            style="width: 100px; height: 100px;">
            <i class="bi bi-currency-dollar" style="font-size: 3.5rem;"></i>
        </div>

        <div>
            <h2 class="fw-bold text-success mb-2">Manajemen Tabungan</h2>
            <p class="text-muted mb-0 fs-6">Kelola, pantau, dan perbarui data tabungan nasabah dengan mudah dan
                efisien</p>
        </div>
    </div>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0"><i class="bi bi-journal-text me-2"></i> Daftar Tabungan</h4>
            <a class="btn btn-light btn-sm rounded-pill" href="{{ url('/savings/create') }}">
                <i class="bi bi-plus-circle"></i> Tambah Tabungan
            </a>
        </div>
        <div class="card-body">

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-success text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama Nasabah</th>
                            <th>Tipe</th>
                            <th>Jumlah</th>
                            <th>Tanggal Terakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($savings as $saving)
                            <tr wire:key="{{ $saving->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $saving->user->name ?? 'Tidak ada' }}</td>
                                <td class="text-center">
                                    @if ($saving->type === 'income')
                                        <span class="badge bg-success px-3 py-2">Pemasukan</span>
                                    @else
                                        <span class="badge bg-danger px-3 py-2">Pengeluaran</span>
                                    @endif
                                </td>
                                <td class="text-end fw-semibold text-success">
                                    Rp {{ number_format($saving->amount, 0, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    {{ optional($saving->updated_at)->format('d-m-Y') }}
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-warning rounded-pill px-3"
                                        wire:click="edit({{ $saving->id }})">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger rounded-pill px-3"
                                        wire:click="delete({{ $saving->id }})"
                                        onclick="confirm('Yakin ingin menghapus?') || event.stopImmediatePropagation()">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox fs-4"></i><br>
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
