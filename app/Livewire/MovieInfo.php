<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;
use App\Models\Hall;
use Illuminate\Support\Facades\Cache;

class MovieInfo extends Component
{
    public $films;
    public $halls;
    public $info;
    public bool $sales;

    public function boot()
    {
        if(Cache::has('sales')) {
            $this->sales = Cache::get('sales'); 
            if ($this->sales === false) {
                $this->info = 'none';
            } elseif ($this->sales === true) {
                $this->info = 'block';
            }
        } else {
            $this->info = 'none';
        }
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
