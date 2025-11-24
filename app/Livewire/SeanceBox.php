<?php

namespace App\Livewire;

use Livewire\Component;

class SeanceBox extends Component
{
    public $seances;
    
    public function render()
    {
        return view('livewire.seance-box');
    }
}
