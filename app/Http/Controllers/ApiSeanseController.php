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
        $seances = $request->all();
        $data = [];
        $i = 0;
        foreach($seances as $seance) {            
            $data[] = [
            'hall_id' => Hall::where('name', $seance[$i]['hall'])->value('id'),
            'film_id' => Film::where('name', $seance[$i]['film'])->value('id'),
            'start' => $seance[$i]['start'],
            ];
            $i++;
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
