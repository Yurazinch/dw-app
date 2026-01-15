<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class DateLine extends Component
{
    public string $value;
    public string $opendate;

    #[On('handle-value')]
    public function chosenDay($value)
    {
        $this->value = $value;
        $this->dispatch('date', date: $this->value)->to(MovieInfo::class);
        //$this->dispatch('change-date')->to(BuyingTicket::class);
    }

    public function boot()
    {
        $this->opendate = 'block';
        $this->value = '';
    }

    #[On('to-dateline')]
    public function showDateLine()
    {
        $this->opendate = 'none';
    }

    public function render()
    {
        return view('livewire.date-line');
    }
}
