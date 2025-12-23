<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hall;
use App\Models\Place;

class PlacePrice extends Component
{
    public $halls;
    public string $class;
    public string $class_checked;
    public $hall_hit;
    public $price_standart = 0;
    public $price_vip = 0;

    public function hithall($hall)
    {        
        $this->hall_hit = $hall['id'];
    }

    public function mount()
    {
        $this->halls = Hall::get();
        $this->class = 'conf-step__radio';
        $this->class_checked = 'conf-step__radio checked';
    }

    public function save()
    {
        $this->price_standart = 0;
        $this->price_vip = 0;
        $this->send();
        $this->reset('price_standart', 'price_vip');
    }

    public function send()
    {
        dd($this->hall_hit, $this->price_standart, $this->price_vip);
        return route('', [$this->hall_hit, $this->price_standart, $this->price_vip]);
    }

    public function clear()
    {
        $this->price_standart = 0;
        $this->price_vip = 0;
    }

    public function render()
    {
        return view('livewire.place-price');
    }
}
