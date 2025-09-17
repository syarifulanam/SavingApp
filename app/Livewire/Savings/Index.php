<?php

namespace App\Livewire\Savings;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Saving;

class Index extends Component
{
    use WithPagination;

    public $showDeleteModal = false;
    public $selectedSavingId;
    public $selectedSavingName;
    public $search = '';
    public $filterType = '';
    public $from_date = '';
    public $to_date = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingFilterType()
    {
        $this->resetPage();
    }
    public function updatingFromDate()
    {
        $this->resetPage();
    }
    public function updatingToDate()
    {
        $this->resetPage();
    }

    public function setDelete($id)
    {
        $saving = Saving::findOrFail($id);
        $this->selectedSavingId   = $saving->id;
        $this->selectedSavingName = $saving->nama_nasabah;
        $this->showDeleteModal    = true;
    }

    public function destroy()
    {
        if ($this->selectedSavingId) {
            $saving = Saving::find($this->selectedSavingId);
            if ($saving) {
                $saving->delete();
                session()->flash('message', 'Savings data has been successfully deleted.');
            }
        }

        $this->reset(['showDeleteModal', 'selectedSavingId', 'selectedSavingName']);
    }

    public function resetFilters()
    {
        $this->reset(['search', 'filterType', 'from_date', 'to_date']);
    }

    public function render()
    {
        $query = Saving::query();

        if ($this->search) {
            $query->where('nama_nasabah', 'like', '%' . $this->search . '%');
        }

        if ($this->filterType) {
            $query->where('type', $this->filterType);
        }

        if ($this->from_date) {
            $query->whereDate('date', '>=', $this->from_date);
        }
        if ($this->to_date) {
            $query->whereDate('date', '<=', $this->to_date);
        }

        $savings = $query->orderBy('date', 'desc')->paginate(10);

        return view('livewire.savings.index', [
            'savings' => $savings
        ]);
    }
}
