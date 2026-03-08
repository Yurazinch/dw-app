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

    public function boot()
    {
        $this->seances = Seance::get();
        $this->films = Film::get();
        $this->halls = Hall::get();
        $this->nextStart = '08:00';
    }
    
    #[On('reload')]
    public function loaded() 
    {
        $this->dispatch('loaded');
        $this->boot();
    }

    #[On('check-seance')]
    public function checkseance() { 
        foreach($this->halls as $hall) {
            $fin = 0;
            $crosseance = [];
            foreach(Seance::where('hall_id', $hall->id)->orderBy('start')->get() as $seance) {                
                if($fin === 0) {
                    $fin = $seance->fin;
                } else {
                    if($seance->left < $fin) {
                        $crosseance[] = $seance->id;
                    }
                    $fin = $seance->fin;
                }             
            }
            if(count($crosseance) > 0) {
                foreach($crosseance as $item) {
                    Seance::where('id', $item)->delete();
                }
                $this->dispatch('seance-deleted');
            }
        }        
        $this->boot();
    }

    public function createform($id) {
        return redirect()->route('seance.create', ['id' => $id]);
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
