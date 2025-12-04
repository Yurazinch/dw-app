<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;
use App\Models\Seance;
use Livewire\Attributes\Reactive;

class SeanceBox extends Component
{
    public $seances;

    public $films;
    
    public function render()
    {
        return view('livewire.seance-box');
    }
}
