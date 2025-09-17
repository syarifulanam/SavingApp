<div class="d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <header class="bg-light shadow-sm py-4 mb-5">
            <div class="container-fluid d-flex align-items-center">
                <div class="bg-success bg-gradient text-white rounded-circle d-flex justify-content-center align-items-center me-4 shadow-lg"
                    style="width: 100px; height: 100px;">
                    <i class="bi bi-currency-dollar" style="font-size: 3.5rem;"></i>
                </div>
                <div>
                    <h2 class="fw-bold text-success mb-2">View Savings</h2>
                    <p class="text-muted mb-0 fs-6">
                        Monitor and Update Savings Easily
                    </p>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="card shadow-lg border-0 rounded-3 mx-auto" style="max-width: 720px;">
                <div class="card-header bg-success text-white text-center py-3 rounded-top-3">
                    <h4 class="mb-0"><i class="bi bi-journal-text me-2"></i> Detail Information</h4>
                </div>
                <div class="card-body p-4">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Customer Name</dt>
                        <dd class="col-sm-8">{{ $saving->nama_nasabah }}</dd>

                        <dt class="col-sm-4">Type</dt>
                        <dd class="col-sm-8">
                            @if ($saving->type === 'income')
                                <span class="badge bg-success px-3 py-2">Income</span>
                            @else
                                <span class="badge bg-danger px-3 py-2">Expense</span>
                            @endif
                        </dd>

                        <dt class="col-sm-4">Amount</dt>
                        <dd class="col-sm-8 fw-semibold text-success">
                            Rp {{ number_format($saving->amount, 0, ',', '.') }}
                        </dd>

                        <dt class="col-sm-4">Date</dt>
                        <dd class="col-sm-8">
                            {{ \Carbon\Carbon::parse($saving->date)->format('d-m-Y') }}
                        </dd>
                    </dl>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('savings.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="bi bi-arrow-left-circle me-1"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-success text-white text-center py-4 shadow-lg mt-auto">
        <div class="container">
            <p class="mb-1 fw-semibold">© {{ date('Y') }} Saving App — Smarter, faster, and secure savings
        </div>
    </footer>
</div>
