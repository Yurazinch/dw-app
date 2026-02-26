<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Hall;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class SeanceController extends Controller
{
    /**
     * Сохранить вновь созданный ресурс в хранилище.
     */
    public function store(Request $request)
    {        
        $validated = $request->validate([
            'hall' => 'required|string|min:3|max:225',
            'film' => 'required|string|min:3|max:225',
            'start_time' => ['required', Rule::date()->format("H:i")],
        ]);

        $film = Film::where('name', $validated['film'])->firstOrFail();
        $hall_id = Hall::where('name', $validated['hall'])->value('id');
        $width = intval(ceil(($film->duration * 0.75) / 10)) * 10;
        $time = explode(':', $validated['start_time']);
        $left = intval(ceil((((intval($time[0]) - 8) * 60 + intval($time[1])) * 0.75) / 10)) * 10;
        $fin = $width + $left;
        $seances = Seance::where('hall_id', $hall_id)->get(); 

        foreach($seances as $seance) {
            if(($seance->left > $left && $seance->left < $fin) || ($seance->fin > $left && $seance->fin < $fin)) {
                return  redirect()->route('admin.home')->with('error', 'Сеанс не может быть создан, пересекается с существующими');
            }
        }

        $seance = new Seance;
        $seance->hall_id = $hall_id;       
        $seance->film_id = $film->id;        
        $seance->start = $validated['start_time'];
        $seance->width = $width;
        $seance->left = $left;
        $seance->fin = $fin;
        $seance->save();
        
        return redirect()->route('admin.home')->with('success', 'Успешно добавлено в расписание');
    }

    /**
     * Отобразить указанный ресурс.
     */
    public function show($id)
    {
        //...
    }


    /**
     * Обновить указанный ресурс в хранилище.
     */
    public function update(Request $request): RedirectResponse
    {
        /*foreach($request as $el) 
        {
            $validated = $el->validate();
            $seance = new Seance;
            $seance->hall_id = Hall::where('name', $validated['hall_name'])->value('id');
            $seance->film_id = Film::where('name', $validated['film_name'])->value('id');
            $seance->start = $validated['atert_time'];
            $seance->save();
        }   
        
        return response()->json(['message' => 'Данные успешно получены!', 'received_data' => $data]);*/
    }
    
    public function destroy(Seance $seance, $id)
    {
        Seance::where('id', $id)->delete();
        return  redirect()->route('admin.home');
    }
}
