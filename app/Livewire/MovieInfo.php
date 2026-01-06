<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;
use App\Models\Hall;
use Livewire\Attributes\On;

class MovieInfo extends Component
{
    public $films;
    public $halls;
    public $info;
    public bool $sales;

    public function boot()
    {
        $this->films = Film::orderBy('start', 'desc')->get();
        $this->halls = Hall::get();
    }    

    public function toBuying($seance)
    {
        $this->info = 'none';
        $this->dispatch('to-buying', seance: $seance)->to(BuyingTicket::class);
    }

    public function render()
    {
        return view('livewire.movie-info');
    }
}
