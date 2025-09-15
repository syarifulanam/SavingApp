<?php

namespace App\Livewire\Savings;

use App\Models\Saving;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $savings = Saving::all();
        return view('livewire.savings.index', compact('savings'));
    }
}
