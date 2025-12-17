<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class FieldSet extends Component
{
    public $seancesToUpdate;

    #[On('seances-save')]
    public function save()
    {
        //..       
    }

    public function render()
    {
        return view('livewire.field-set');
    }
}