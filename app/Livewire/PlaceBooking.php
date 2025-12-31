<?php

namespace App\Livewire;

use Livewire\Component;

class PlaceBooking extends Component
{
    public $seance;
    public $value;
    public $rows;
    public $places;
    //public $value;

    /*public function mount ()
    {
        $this->places = Place::where('hall_id', $this->hall_id)->get();
        $this->rows = Place::where('hall_id', $this->hall_id)->groupBy('row')->pluck('row');
    }*/

    public function render()
    {
        return view('livewire.place-booking');
    }
}
