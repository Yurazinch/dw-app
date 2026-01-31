<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seance;
use App\Models\Film;
use App\Models\Hall;
use Livewire\Attributes\On; 

class TimeLine extends Component
{
    public $halls;
    public $films;   
    public $seances;
    public $nextStart;

    #[On('reload')]
    public function boot()
    {
        $this->seances = Seance::get();
        $this->films = Film::get();
        $this->halls = Hall::get();
        $this->nextStart = '08:00';
    }
    
    public function addform($id, $start) 
    {
        return redirect()->route('seance.create', ['id' => $id, 'start' => $start]);
    }

    public function removeform($id)
    {
        return redirect()->route('seance.toremove', ['id' => $id]);
    }
        
    public function render()
    {
        return view('livewire.time-line');
    }
}
