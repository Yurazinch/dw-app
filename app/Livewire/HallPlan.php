<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hall;
use App\Models\Place;
use Livewire\Attributes\On;

class HallPlan extends Component
{
    public $rows;
    public $places;
    public $empty;
    public $plan;
    public $halls; 
    public int $hall_id;

    #[On('hall-selected')]
    public function hallselect($hall)
    {   
        $this->hall_id = $hall;        
        $count = Place::where('hall_id', $this->hall_id)->get()->modelKeys();              
        if($count !== []) {
            $this->places = Place::where('hall_id', $this->hall_id)->get();
            $this->rows = Place::where('hall_id', $this->hall_id)->groupBy('row')->pluck('row');
            $this->empty = 'none';
            $this->plan = 'block';
        } else {
            $this->places = [];
            $this->rows = [];
            $this->empty = 'block';
            $this->plan = 'none';
        }       
    }

    public function halldeleted() 
    {
        return redirect()->route('plan.remove', [$this->hall_id]);
    }
    
    public function mount()
    {
        $this->halls = Hall::get();
        $this->places = [];
        $this->rows = [];
        $this->empty = 'block';
        $this->plan = 'none';        
    }

    public function save($place)
    {
        if($place['type'] === 'disabled') {
            $this->type = 'standart';
        } elseif ($place['type'] === 'standart') {
            $this->type = 'vip';
        } elseif ($place['type'] === 'vip') {
            $this->type = 'disabled';
        }
        Place::where('id', $place['id'])->update(['type' => $this->type]);
        $activeHall = Hall::find($place['hall_id']);
        $hall = $activeHall->id;
        $this->hallselect($hall);
    }

    public function render()
    {
        return view('livewire.hall-plan');
    }
}
