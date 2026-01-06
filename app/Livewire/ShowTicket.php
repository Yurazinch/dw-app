<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class ShowTicket extends Component
{
    public $show;

    public function mount()
    {
        $this->show = 'none';
    }

    #[On('show-ticket')]
    public function showTicket()
    {
        $this->show = 'block';
    }

    public function render()
    {
        return view('livewire.show-ticket');
    }
}
