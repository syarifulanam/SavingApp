<?php

namespace App\Livewire\Savings;

use Livewire\Component;
use App\Models\Saving;

class Index extends Component
{
    public $savings;
    public $showDeleteModal = false;
    public $selectedSavingId;
    public $selectedSavingName;

    public function mount()
    {
        $this->savings = Saving::latest()->get();
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

        $this->savings = Saving::latest()->get();
    }

    public function render()
    {
        $savings = Saving::all();
        return view('livewire.savings.index', compact('savings'));
    }
}
