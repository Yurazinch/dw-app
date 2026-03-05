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
        /*foreach($seances as $seance) {
            $exist_seances = Hall::where('name', $seance['hall'])->get();
            dd($exist_seances);
            foreach($exist_seances as $exist_seance) {
                if($exist_seance->fin > $seance['left'] && $exist_seance->fin < $seance['fin']) {
                    return redirect()->route('admin.home')->with('error', 'Сеанс не может быть создан, пересекается с существующими');
                }
            }
        }*/
        $data = [];        
        foreach($seances as $seance) {
            $data[] = [
            'hall_id' => Hall::where('name', $seance['hall'])->value('id'),
            'film_id' => Film::where('name', $seance['film'])->value('id'),
            'start' => $seance['start'],
            'width' => $seance['width'],
            'left' => $seance['left'],
            'fin' => $seance['fin'],
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
