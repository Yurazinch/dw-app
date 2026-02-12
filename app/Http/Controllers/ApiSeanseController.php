<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seance;
use App\Models\Hall;
use App\Models\Film;
use App\Http\Requests\StoreSeanceRequest;
use App\Http\Requests\UpdateSeanceRequest;

class ApiSeanseController extends Controller
{
    public function index()
    {
        return Seance::get();
    }
    
    public function store(StoreSeanceRequest $request)
    {
        $seances = $request->seances;
        $data = [];        
        foreach($seances as $seance) {            
            $data[] = [
            'hall_id' => Hall::where('name', $seance['hall'])->value('id'),
            'film_id' => Film::where('name', $seance['film'])->value('id'),
            'start' => $seance['start'],
            'width' => $seance['width'],
            'left' => $seance['left'],
            ];
        }
        return Seance::insert($data);
    }
    
    public function show(string $id)
    {        
        return Seance::where('id', $id)->get();
    }
    
    public function update(UpdateSeanceRequest $request, string $id)
    {
        $seance = Seance::where('id', $id)->get(); 
        return $seance->update->all();
    }
    
    public function destroy(string $id)
    {
        return Seance::where('id', $id)->delete();
    }
}
