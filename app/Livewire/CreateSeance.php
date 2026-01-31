<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hall;
use App\Models\Film;
use App\Models\Seance;
use Illuminate\Http\Request;

class CreateSeance extends Component
{
    public $films;
    public $name;
    public $nextStart;
    
    public function boot(Request $request)
    { 
        $this->name = Hall::findOrFail($request->id)->name;
        $this->films = Film::get();
        $this->nextStart = $request->start;
    }
    
    public function render()
    {
        return view('livewire.create-seance');
    }
}
