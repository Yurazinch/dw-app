<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;

class FilmList extends Component
{
    public $films;

    public function boot()
    {
        $this->films = Film::get();
    }
    
    public function render()
    {
        return view('livewire.film-list');
    }
}
