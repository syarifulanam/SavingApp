<div class="d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <header class="bg-light shadow-sm py-4 mb-5">
            <div class="container-fluid d-flex align-items-center">
                <div class="bg-success bg-gradient text-white rounded-circle d-flex justify-content-center align-items-center me-4 shadow-lg"
                    style="width: 100px; height: 100px;">
                    <i class="bi bi-currency-dollar" style="font-size: 3.5rem;"></i>
                </div>
                <div>
                    <h2 class="fw-bold text-success mb-2">Savings Management</h2>
                    <p class="text-muted mb-0 fs-6">
                        Manage, monitor, and update customer savings data easily and efficiently
                    </p>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0"><i class="bi bi-journal-text me-2"></i> Savings List</h4>
                    <a class="btn btn-light btn-sm rounded-pill" href="{{ route('savings.create') }}">
                        <i class="bi bi-plus-circle me-1"></i> Add Savings
                    </a>
                </div>

                <div class="card-body">
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
                                    <th class="text-start">Customer Name</th>
                                    <th>Type</th>
                                    <th class="text-end">Amount</th>
                                    <th>Last Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($savings as $index => $saving)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-start">{{ $saving->nama_nasabah ?? 'Not Available' }}</td>
                                        <td class="text-center">
                                            @if ($saving->type === 'income')
                                                <span class="badge bg-success px-3 py-2">Income</span>
                                            @else
                                                <span class="badge bg-danger px-3 py-2">Expense</span>
                                            @endif
                                        </td>
                                        <td class="text-end fw-semibold text-success">
                                            Rp {{ number_format($saving->amount, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($saving->date)->format('d-m-Y') }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('savings.view', $saving->id) }}"
                                                class="btn btn-info btn-sm rounded-pill px-3 text-white">
                                                <i class="bi bi-eye me-1"></i> View
                                            </a>

                                            <a href="{{ route('savings.edit', $saving->id) }}"
                                                class="btn btn-warning btn-sm rounded-pill px-3">
                                                Edit
                                            </a>
                                            <button type="button" wire:click="setDelete({{ $saving->id }})"
                                                class="btn btn-danger btn-sm rounded-pill px-3">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            <i class="bi bi-inbox fs-4 mb-2"></i><br>
                                            No savings data available
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if ($showDeleteModal)
                <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);"
                    wire:ignore.self>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title">Delete Confirmation</h5>
                                <button type="button" class="btn-close btn-close-white"
                                    wire:click="$set('showDeleteModal', false)"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete <strong>{{ $selectedSavingName }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    wire:click="$set('showDeleteModal', false)">Cancel</button>
                                <button type="button" class="btn bg-success" wire:click="destroy">Yes, Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>

    <footer class="bg-success text-white text-center py-4 shadow-lg mt-auto">
        <div class="container">
            <p class="mb-1 fw-semibold">© {{ date('Y') }} Saving App — Smarter, faster, and secure savings
                management.</p>
        </div>
    </footer>
</div>
