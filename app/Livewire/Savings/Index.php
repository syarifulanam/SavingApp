<?php

namespace App\Livewire\Savings;

use Livewire\Component;
use App\Models\Saving;

class Index extends Component
{
    public $savings;
    public $selectedSavingId = null;
    public $selectedSavingName = null;
    public $showDeleteModal = false; // kontrol modal

    public function mount()
    {
        $this->loadSavings();
    }

    public function loadSavings()
    {
        $this->savings = Saving::all();
    }

    // Set data yang akan dihapus dan buka modal
    public function setDelete($id)
    {
        $saving = Saving::findOrFail($id);
        $this->selectedSavingId = $saving->id;
        $this->selectedSavingName = $saving->nama_nasabah;
        $this->showDeleteModal = true;
    }

    // Hapus data tabungan
    public function destroy()
    {
        if ($this->selectedSavingId) {
            $saving = Saving::findOrFail($this->selectedSavingId);
            $saving->delete();

            session()->flash('message', 'Data tabungan berhasil dihapus.');

            // Reset modal data
            $this->selectedSavingId = null;
            $this->selectedSavingName = null;
            $this->showDeleteModal = false;

            $this->loadSavings();
        }
    }

    public function render()
    {
        return view('livewire.savings.index');
    }
}



    // public function render()
    // {
    //     $savings = Saving::all();
    //     return view('livewire.savings.index', compact('savings'));
    // }
