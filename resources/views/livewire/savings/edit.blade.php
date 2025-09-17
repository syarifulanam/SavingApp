<div class="d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <div class="w-100 bg-light py-3 shadow-sm mb-4">
            <div class="container-fluid d-flex align-items-center ps-4">
                <div class="bg-success bg-gradient text-white rounded-circle d-flex justify-content-center align-items-center me-3 shadow"
                    style="width: 60px; height: 60px;">
                    <i class="bi bi-pencil-square" style="font-size: 1.8rem;"></i>
                </div>
                <div>
                    <h3 class="fw-bold text-success mb-1">Edit Savings</h3>
                    <small class="text-muted">Update customer savings data accurately</small>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 720px;">
                <div class="card-header bg-success bg-gradient text-white text-center py-3 rounded-top-4">
                    <h5 class="mb-0"><i class="bi bi-journal-text me-2"></i> Edit Savings Form</h5>
                </div>
                <div class="card-body p-4">

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center"
                            role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <div>{{ session('success') }}</div>
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form wire:submit.prevent="update" novalidate>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Customer Name</label>
                            <input type="text"
                                class="form-control rounded-pill shadow-sm @error('nama_nasabah') is-invalid @enderror"
                                wire:model.defer="nama_nasabah" placeholder="Enter customer name">
                            @error('nama_nasabah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Savings Type</label>
                            <select class="form-select rounded-pill shadow-sm @error('type') is-invalid @enderror"
                                wire:model.defer="type">
                                <option value="">-- Select Type --</option>
                                <option value="income">Income</option>
                                <option value="expense">Expense</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Amount</label>
                            <input type="number"
                                class="form-control rounded-pill shadow-sm @error('amount') is-invalid @enderror"
                                wire:model.defer="amount" placeholder="Enter savings amount">
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Date</label>
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
                                <i class="bi bi-arrow-left-circle me-1"></i> Back
                            </a>
                            <button type="submit" class="btn btn-success bg-gradient rounded-pill px-4 shadow-sm">
                                <i class="bi bi-check2-circle me-1"></i> Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <footer class="bg-success text-white text-center py-3 shadow-lg mt-auto">
        <div class="container">
            <p class="mb-1 fw-semibold">© {{ date('Y') }} Saving App — Smarter, faster, and secure savings
                management.</p>
        </div>
    </footer>
</div>
