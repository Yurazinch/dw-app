<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hall;
use App\Models\Place;
use Livewire\Attributes\Validate;

class PlacePrice extends Component
{
    public $halls;
    public string $class;
    public string $class_checked;
    public $hall_hit;
    public $message;
    public $disabled;

    #[Validate('required|integer|min:0')]
    public $price_standart;

    #[Validate('required|integer|min:0')]
    public $price_vip;
    

    public function mount()
    {
        $this->halls = Hall::get();
        $this->class = 'conf-step__radio';
        $this->class_checked = 'conf-step__radio checked';
        $this->price_standart = '';
        $this->price_vip = '';
        $this->message = '';
    }

    public function hithall($hall)
    {        
        $this->hall_hit = $hall['id'];
        $this->price_standart = 0;
        $this->price_vip = 0;
        $this->show();
    }

    public function show()
    {
        $count = Place::where('hall_id', $this->hall_hit)->count();
        if($count > 0) {
            $standart = Place::where('hall_id', $this->hall_hit)->where('type', 'standart')->value('price');            
            $vip = Place::where('hall_id', $this->hall_hit)->where('type', 'vip')->value('price');            
            if($standart !== '0' || $vip !== '0') {
                $this->price_standart = $standart;
                $this->price_vip = $vip;                
            } else {
                $this->price_standart = '0';
                $this->price_vip = '0';
            }
            $this->message = '';
        } else {
            $this->message = 'Нужно сформировать план зала!';
        }
    }

    public function save()
    {
        $this->validate();
        if($this->hall_hit > 0) {
            Place::where('hall_id', $this->hall_hit)->where('type', 'standart')->update(['price' => $this->price_standart]);
            Place::where('hall_id', $this->hall_hit)->where('type', 'vip')->update(['price' => $this->price_vip]);
            $this->show();
        } else {
            $this->message = 'Не выбран зал!';
        }
    }

    public function clear()
    {
        if($this->hall_hit > 0) {
            $this->show();
        } else {
            $this->mount();
        }
    }

    public function render()
    {
        return view('livewire.place-price');
    }
}
