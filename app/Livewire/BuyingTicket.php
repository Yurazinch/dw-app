<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class BuyingTicket extends Component
{
    public $buying;

    public function mount()
    {
        $this->buying = 'none';
    }

    #[On('to-buying')]
    public function addInfo($seance)
    {
        $this->buying = 'block';
    }

    public function toConfirm()
    {
        $this->buying = 'none';
        $this->dispatch('to-confirm')->to(ConfirmTicket::class);
    }

    public function render()
    {
        return view('livewire.buying-ticket');
    }
}
