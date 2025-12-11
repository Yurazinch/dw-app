<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Hall;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;;

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
        return Seance::findOrFail($id);
    }


    /**
     * Обновить указанный ресурс в хранилище.
     */
    public function update(SeanceRequest $request, Seance $seance)
    {
        $seance->fill($request->validate());
        return $seance->save();
    }

    /**
     * Удалить указанный ресурс из хранилища.
     */
    public function destroy(Seance $seance, $id)
    {
        $seance = Seance::where('id', $id)->delete();
        return redirect()->route('admin.lists');
    }
}
