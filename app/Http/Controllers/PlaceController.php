<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Отобразить список ресурса.
     */
    public function index()
    {
        return Place::get();
    }

    /**
     * Сохранить вновь созданный ресурс в хранилище.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hall_id' => 'required|int',
            'row' => 'required|int',
            'place' => 'required|int',
            'status' => 'required|string|max:225',
            'price' => 'nullable|integer|gt:0',
        ]);
        
        $place = new Place;
        $place->hall_id = $validated->hall_id;
        $place->row = $validated->row;
        $place->place = $validated->place;
        $place->status = $validated->status;
        $place->price = $validated->price;
        $place->save();
        return redirect()->route('admin.home');
    }

    /**
     * Отобразить указанный ресурс.
     */
    public function show(Place $place)
    {
        return Place::findOrFail('hall_id')->get();
    }

    /**
     * Обновить указанный ресурс в хранилище.
     */
    public function update(Request $request, Place $place)
    {
        $place->fill($request->validated());
        return $place->save();
    }

    /**
     * Удалить указанный ресурс из хранилища.
     */
    public function destroy(Place $place)
    {
        if($place->delete()) {
            return response(null, response::HTTP_NO_CONTENT);
        }
        return null;
    }
}
