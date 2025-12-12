<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceRemove extends Component
{
    public $id;
    public Seance $seance;
    public function boot(Request $request)
    {
        $this->id = $request->id;
        $this->seance = Seance::findOrFail($this->id);
    } 
    
    public function render()
    {        
        return view('livewire.seance-remove');
    }
}
