<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seance;
use App\Models\Place;
use App\Models\Hall;
use App\Models\Film;
use Livewire\Attributes\On;

class BuyingTicket extends Component
{
    public $buying;
    public $seance;
    public $hallName;
    public $filmName;
    public $seanceStart;
    public $seanceDate;
    public $rows;
    public $places;
    public $selectedPlaces;
    public $priceStandart;
    public $priceVip;
    public $data = [];

    public function mount()
    {
        $this->buying = 'none';
        $this->places = [];
        $this->rows = [];
        $this->hallName = '';
        $this->filmName = '';
        $this->seanceStart = '';
        $this->priceStandart = '';
        $this->priceVip = '';    
    }

    #[On('to-buying')]
    public function addInfo($seance, $date)
    {
        $this->buying = 'block';
        $this->seance = $seance;
        $this->seanceDate = $date;
        $this->hallName = Hall::where('id', $this->seance['hall_id'])->value('name');
        $this->filmName = Film::where('id', $this->seance['film_id'])->value('name');
        $this->seanceStart = $this->seance['start'];     
        $this->priceStandart = Place::where('hall_id', $this->seance['hall_id'])->where('type', 'standart')->value('price');
        $this->priceVip = Place::where('hall_id', $this->seance['hall_id'])->where('type', 'vip')->value('price');
        $this->hallPlan();
    }

    #[On('date')]
    public function addDate($date)
    {
        $this->seanceDate = $date;
    }

    public function hallPlan() {
        $this->places = Place::where('hall_id', $this->seance['hall_id'])->get();
        $this->rows = Place::where('hall_id', $this->seance['hall_id'])->groupBy('row')->pluck('row');
    }

    public function select($place)
    {
        $this->place = $place;       
        if($this->place['type'] === 'standart' || $this->place['type'] === 'vip') {
            $this->type = 'selected';
        } elseif ($this->place['type'] === 'selected') {
            if($this->place['price'] === $this->priceStandart) {
                $this->type = 'standart';
            }elseif($this->place['price'] === $this->priceVip) {
                $this->type = 'vip';
            }
        }
        Place::where('id', $place['id'])->update(['type' => $this->type]);
        $this->hallPlan();
    }

    public function take()
    {        
        $this->selectedPlaces = Place::where('hall_id', $this->seance['hall_id'])->where('type', 'selected')->get(); 
        $this->data = [
            'hallName' => $this->hallName,
            'filmName' => $this->filmName,
            'seanceStart' => $this->seanceStart,
            'seanceDate' => $this->seanceDate,
            'priceStandart' => $this->priceStandart,
            'priceVip' => $this->priceVip,
            'selectedPlaces' => $this->selectedPlaces
        ];    
        $this->dispatch('to-confirm', $this->data)->to(ConfirmTicket::class);        
        $this->buying = 'none';
        $this->data = [];
    }

    public function render()
    {
        return view('livewire.buying-ticket');
    }
}
