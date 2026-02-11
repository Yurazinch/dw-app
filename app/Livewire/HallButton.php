<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hall;

class HallButton extends Component
{
    public $halls;
    public string $class;
    public string $class_checked;
    public int $hall_checked;

    public function activehall($id)
    {        
        $this->dispatch('hall-selected', hall: $id);
        $this->hall_checked = $id;
    }

    public function mount()
    {
        $this->halls = Hall::get();
        $this->class = 'conf-step__radio';
        $this->class_checked = 'conf-step__radio checked';
    }
    
    public function render()
    {
        return view('livewire.hall-button');
    }
}
