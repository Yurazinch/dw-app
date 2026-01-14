<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class OpenSales extends Component
{
    public bool $sales;

    public function __construct() {
        $this->sales = Cache::get('sales', false);
    }

    public function toggle()
    {
        $this->sales = ! $this->sales;
        if($this->sales === true) {
            Cache::forever('sales', true);
            $this->dispatch('opened');
        } else {
            Cache::forget('sales');
            $this->dispatch('closed');
        }
    }
    
    public function render()
    {
        return view('livewire.open-sales');
    }
}
