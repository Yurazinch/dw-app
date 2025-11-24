<?php

namespace App\Livewire;

use Livewire\Component;

class HallList extends Component
{
    public $halls;
    
    public function render()
    {
        return view('livewire.hall-list');
    }
}
