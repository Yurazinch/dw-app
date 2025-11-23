<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;

class FilmList extends Component
{
    public $films;

    public function mount(Film $films) {
        $this->films = $films;
    }

    public function render()
    {
        return view('livewire.film-list');
    }
}
