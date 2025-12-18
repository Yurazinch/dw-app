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

    public array $timeline = [ 
        '08:00', 
        '10:00', 
        '12:00', 
        '14:00', 
        '16:00', 
        '18:00', 
        '20:00',
        '22:00', 
    ];   

    #[On('reload')]
    public function boot()
    {
        $this->seances = Seance::get();
        $this->films = Film::get();
        $this->halls = Hall::get();
    }
    
    public function addform($id, $value) 
    {
        return redirect()->route('seance.create', ['id' => $id, 'value' => $value]);
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
