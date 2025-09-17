<div class="d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <div class="w-100 bg-light py-5 shadow-sm mb-5">
            <div class="container d-flex align-items-center">
                <div class="bg-success bg-gradient text-white rounded-circle d-flex justify-content-center align-items-center me-4 shadow-lg"
                    style="width: 90px; height: 90px;">
                    <i class="bi bi-currency-dollar" style="font-size: 3rem;"></i>
                </div>
                <div>
                    <h2 class="fw-bold text-success mb-2">Add Savings</h2>
                    <p class="text-muted mb-0 fs-6">Fill in the customer savings data completely and accurately</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 720px;">
                <div class="card-header bg-success bg-gradient text-white text-center py-3 rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i> Add Savings Form</h4>
                </div>
                <div class="card-body p-4">

                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <div>{{ session('message') }}</div>
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form wire:submit.prevent="save" novalidate>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Customer Name</label>
                            <input type="text" class="form-control rounded-pill shadow-sm @error('nama_nasabah') is-invalid @enderror"
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
                            <input type="number" class="form-control rounded-pill shadow-sm @error('amount') is-invalid @enderror"
                                wire:model.defer="amount" placeholder="Enter savings amount">
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="date" class="form-control rounded-pill shadow-sm @error('date') is-invalid @enderror"
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
                                <i class="bi bi-save me-1"></i> Save
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <footer class="bg-success text-white text-center py-4 shadow-lg mt-auto">
        <div class="container">
            <p class="mb-1 fw-semibold">© {{ date('Y') }} Saving App. All rights reserved.</p>
        </div>
    </footer>
</div>
