<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class SalesClosed extends Component
{
    public $close;
    public bool $sales;

    public function boot()
    {
        if(Cache::has('sales')) {
            $this->sales = Cache::get('sales'); 
            if ($this->sales === false) {
                $this->close = 'block';
            } elseif ($this->sales === true) {
                $this->close = 'none';
            }
        } else {
            $this->close = 'block';
        }
    }

    public function render()
    {
        return view('livewire.sales-closed');
    }
}
