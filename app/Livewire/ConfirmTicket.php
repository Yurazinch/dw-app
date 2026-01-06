<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class ConfirmTicket extends Component
{
    public $confirm;

    public function mount()
    {
        $this->confirm = 'none';
    }

    #[On('to-confirm')]
    public function confirmInfo()
    {
        $this->confirm = 'block';
    }

    public function toShow()
    {
        $this->confirm = 'none';
        $this->dispatch('show-ticket')->to(ShowTicket::class);
    }

    public function render()
    {
        return view('livewire.confirm-ticket');
    }
}
