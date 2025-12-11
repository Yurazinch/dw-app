<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seance;
use App\Models\Film;
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
    
    public bool $isEmpty = true;

    public function addform() 
    {
        return redirect()->route('seance.create', []);
    }

    public function removeform($id)
    {
        return redirect()->route('seance.toremove', ['id' => $id]);
    }
        
    #[On('reload')]
    public function render()
    {
        return view('livewire.time-line');
    }
}
