<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seance;
use App\Models\Hall;
use App\Models\Film;
use App\Models\Place;
use Livewire\Attributes\On;

class ConfirmTicket extends Component
{
    public $confirm;    
    public $selectPlaces;
    public $selectFilm;
    public $selectHall;
    public $selectTime;
    public $selectDate;
    public $priceStandart;
    public $priceVip;
    public string $chosenChairs;
    public array $prices;
    public int $sum;
    public array $toTicket;

    public function mount()
    {
        $this->confirm = 'none';
        $this->selectFilm = '';
        $this->selectHall = '';
        $this->selectTime = '';
        $this->selectDate = '';
        $this->chosenChairs = '';
        $this->prices = [];
        $this->sum = 0;
    }

    #[On('to-confirm')]
    public function confirmInfo($data)
    {
        $this->selectPlaces = $data['selectedPlaces'];
        foreach($this->selectPlaces as $selectPlace) {
            $this->chosenChairs .= 'ряд: ' . $selectPlace['row'] . ', место: ' . $selectPlace['place'] . '; ';
            $this->prices[] = intval($selectPlace['price']);          
        }
        $this->sum = array_sum($this->prices);
        $this->selectFilm = $data['filmName'];
        $this->selectHall = $data['hallName'];
        $this->selectTime = $data['seanceStart'];
        $this->selectDate = $data['seanceDate'];
        $this->priceStandart = $data['priceStandart'];
        $this->priceVip = $data['priceVip'];
        $this->confirm = 'block';
        $this->toTicket = [
            'film' => $this->selectFilm,
            'hall' => $this->selectHall,
            'time' => $this->selectTime,
            'date' => $this->selectDate,
            'chairs' => $this->chosenChairs,
            'sum' => $this->sum,
        ];
    }

    public function resetType()
    {
        foreach($this->selectPlaces as $selectPlace) {
            if($selectPlace['price'] === $this->priceStandart) {
                Place::where('id', $selectPlace['id'])->update(['type' => 'standart']);
            } elseif ($selectPlace['price'] === $this->priceVip) {
                Place::where('id', $selectPlace['id'])->update(['type' => 'vip']);
            }
        }
    }

    public function toShow()
    {
        $this->confirm = 'none';
        $this->dispatch('show-ticket', ticket: $this->toTicket)->to(ShowTicket::class);        
        $this->resetType();        
    }

    public function render()
    {
        return view('livewire.confirm-ticket');
    }
}
