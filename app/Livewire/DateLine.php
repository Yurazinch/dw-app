<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class DateLine extends Component
{
    public string $value;

    #[On('handle-value')]
    public function chosenDay($value)
    {
        $this->value = $value;
        $this->dispatch('date', date: $this->value)->to(MovieInfo::class);
    }

    public function boot()
    {
        $this->value = '';
    }

    public function render()
    {
        return view('livewire.date-line');
    }
}
