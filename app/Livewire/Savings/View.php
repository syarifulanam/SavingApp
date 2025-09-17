<?php

namespace App\Livewire\Savings;

use Livewire\Component;
use App\Models\Saving;

class View extends Component
{
    public $savingId;
    public $saving;

    public function mount($id)
    {
        $this->savingId = $id;
        $this->saving = Saving::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.savings.view');
    }
}
