<?php

namespace App\Livewire\Savings;

use Livewire\Component;
use App\Models\Saving;

class Create extends Component
{
    public $nama_nasabah;
    public $type;
    public $amount;
    public $date;

    protected $rules = [
        'nama_nasabah' => 'required|string|max:255',
        'type'         => 'required|in:income,expense',
        'amount'       => 'required|numeric|min:1',
        'date'         => 'required|date',
    ];

    public function save()
    {
        $this->validate();

        Saving::create([
            'nama_nasabah' => $this->nama_nasabah,
            'type'   => $this->type,
            'amount' => $this->amount,
            'created_at' => $this->date,
            'updated_at' => now(),
        ]);

        session()->flash('message', 'Data tabungan berhasil disimpan!');
        return redirect()->route('savings.index');
    }

    public function render()
    {
        return view('livewire.savings.create');
    }
}
