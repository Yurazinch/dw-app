<?php

namespace App\Livewire;

use Livewire\Component;

class HallButton extends Component
{
    public $halls;
    
    public function render()
    {
        return view('livewire.hall-button');
    }
}
