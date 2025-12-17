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

        $seance = new Seance;
        $seance->hall_id = Hall::where('name', $validated['hall'])->value('id');
        $seance->film_id = Film::where('name', $validated['film'])->value('id');
        $seance->start = $validated['start_time'];
        $seance->save();
        
        return redirect()->route('admin.lists');
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
        return  redirect()->route('admin.lists');
    }
}
