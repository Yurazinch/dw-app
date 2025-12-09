<?php

namespace App\Livewire;

use Livewire\Component;

class FieldSet extends Component
{
    public function save()
    {
        // нажатие кнопки type="submit" забираю данные из js
    }

    public function render()
    {
        return view('livewire.field-set');
    }
}
