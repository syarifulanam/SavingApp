<?php

namespace App\Livewire\Savings;

use Livewire\Component;
use App\Models\Saving;

class Edit extends Component
{
    public $savingId;
    public $nama_nasabah, $type, $amount, $date;

    public function mount($id)
    {
        $saving = Saving::findOrFail($id);

        $this->savingId     = $saving->id;
        $this->nama_nasabah = $saving->nama_nasabah;
        $this->type         = $saving->type;
        $this->amount       = $saving->amount;
        $this->date         = $saving->date;
    }

    public function update()
    {
        $this->validate([
            'nama_nasabah' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $saving = Saving::findOrFail($this->savingId);

        $saving->update([
            'nama_nasabah' => $this->nama_nasabah,
            'type'         => $this->type,
            'amount'       => $this->amount,
            'date'         => $this->date,
        ]);

        session()->flash('success', 'Tabungan berhasil diperbarui!');
        return redirect()->route('savings.index');
    }

    public function render()
    {
        return view('livewire.savings.edit');
    }
}
