<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
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
    public $currentTime;
    public $currentDate;
    public bool $sales;

    public function boot()
    {
        if(Cache::has('sales')) {
            $this->sales = Cache::get('sales'); 
            if ($this->sales === false) {
                $this->info = 'none';
                $this->dispatch('to-dateline')->to(DateLine::class);
                
            } elseif ($this->sales === true) {
                $this->info = 'block';
            }
        } else {
            $this->info = 'none';
            $this->dispatch('to-dateline')->to(DateLine::class);
        }
        $this->films = Film::orderBy('start')->get();
        $this->halls = Hall::get();
        $this->currentTime = Carbon::now(+3)->hour . ':' . Carbon::now()->minute;
        $this->currentDate = Carbon::now(+3)->locale('ru')->translatedFormat('d F');
    }  
    
    #[On('date')]
    public function addDate($date) {
        $this->date = $date;
    }

    public function toBuying($seance)
    {
        if($this->date === null) {
            $this->dispatch('date-null');
        } elseif($this->date === $this->currentDate && $seance['start'] < $this->currentTime) {
            $this->dispatch('time-left');
        } else {
            $this->info = 'none';
            $this->dispatch('to-buying', seance: $seance, date: $this->date)->to(BuyingTicket::class);
            $this->dispatch('to-dateline')->to(DateLine::class);
        }
    }

    public function render()
    {
        return view('livewire.movie-info');
    }
}
