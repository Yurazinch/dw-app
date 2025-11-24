<?php

namespace App\Livewire;

use Livewire\Component;

class TimeLine extends Component
{
    public $halls;
    
    public function render()
    {
        return view('livewire.time-line');
    }
}
