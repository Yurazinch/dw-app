<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;

class ShowTicket extends Component
{
    public $show;
    public $ticket;
    public $film;
    public $hall;
    public $places;
    public $start;
    public $date;
    public $toCodeString;
    public $qrCodePath;
    public $boockingId;


    public function mount()
    {
        $this->show = 'none';
        $this->film = '';
        $this->hall = '';
        $this->places = '';
        $this->start = '';
        $this->date = '';
        $this->toCodeString = '';
        $this->qrCodePath = '';
    }

    #[On('show-ticket')]
    public function showTicket($ticket)
    {
        $this->show = 'block';
        $booking = Booking::where('date', $ticket['date'])->orderByDesc('id')->first(); 
        $this->bookingId = $booking->id;            
        $this->qrCodePath = "storage/$this->bookingId.png";      
        $this->ticket = $ticket;
        $this->toCodeString = implode(';', $this->ticket);
        $this->qrCodeGenerate();
        $this->film = $ticket['film'];
        $this->hall = $ticket['hall'];
        $this->places = $ticket['places'];
        $this->start = $ticket['start'];
        $this->date = $ticket['date'];
    }

    public function qrCodeGenerate()
    {        
        QrCode::format('png')
        ->encoding('UTF-8')
        ->size(300)
        ->generate($this->toCodeString, public_path($this->qrCodePath));        
    }

    public function render()
    {
        return view('livewire.show-ticket');
    }
}
