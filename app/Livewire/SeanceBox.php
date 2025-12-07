<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;
use App\Models\Seance;
use Livewire\Attributes\Reactive;

class SeanceBox extends Component
{
    public function render()
    {
        $film = Seance::where('film_id')->film;
        return view('livewire.seance-box', [$film]);
    }
}
