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

    // ambil data
    public function mount()
    {
        $this->savings = Saving::latest()->get();
    }

    // buka modal delete
    public function setDelete($id)
    {
        $saving = Saving::findOrFail($id);
        $this->selectedSavingId = $saving->id;
        $this->selectedSavingName = $saving->nama_nasabah;
        $this->showDeleteModal = true;
    }

    // hapus data
    public function destroy()
    {
        if ($this->selectedSavingId) {
            Saving::find($this->selectedSavingId)?->delete();

            session()->flash('message', 'Data tabungan berhasil dihapus.');

            // reset modal
            $this->reset(['showDeleteModal', 'selectedSavingId', 'selectedSavingName']);

            // refresh data
            $this->savings = Saving::latest()->get();
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
