<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;
use App\Models\Hall;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;

class MovieInfo extends Component
{
    public $films;
    public $halls;
    public $info;
    public $date = null;
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
    
    #[On('date')]
    public function addDate($date) {
        $this->date = $date;
    }

    public function toBuying($seance)
    {
        if($this->date === null) {
            $this->dispatch('date-null');
        } else {
            $this->info = 'none';
            $this->dispatch('to-buying', seance: $seance, date: $this->date)->to(BuyingTicket::class);
        }
    }

    public function render()
    {
        return view('livewire.movie-info');
    }
}
