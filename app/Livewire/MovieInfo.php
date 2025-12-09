<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;
use App\Models\Hall;

class MovieInfo extends Component
{
    public $films;
    public $halls;

    public function boot()
    {
        $this->films = Film::get();
        $this->halls = Hall::get();
    }

    public function render()
    {
        return view('livewire.movie-info');
    }
}
