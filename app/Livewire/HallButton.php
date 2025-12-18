<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hall;

class HallButton extends Component
{
    public $halls;

    public function boot()
    {
        $this->halls = Hall::get();
    }
    
    public function render()
    {
        return view('livewire.hall-button');
    }
}
