<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;
use App\Events\HallCreated;

class HallController extends Controller
{
    /**
     * Показать форму создания нового ресурса.
     */
    public function create()
    {
       return view('/admin/addhall');
    }

    /**
     * Сохранить вновь созданный ресурс в хранилище.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|lowercase|unique:halls,name|max:25',
        ]);
        
        $hall = new Hall;
        $hall->name = $validated['name'];     
        $hall->save();
        return redirect()->route('admin.home');
    }

    /**
     * Отобразить указанный ресурс.
     */
    public function show(Hall $hall)
    {
        //
    }

    /**
     * Показать форму редактирования указанного ресурса.
     */
    public function edit(Hall $hall)
    {
        //
    }

    /**
     * Обновить указанный ресурс в хранилище.
     */
    public function update(Request $request, Hall $hall)
    {
        //
    }

    /**
     * Удалить указанный ресурс из хранилища.
     */
    public function destroy($id)
    {
        $hall = Hall::where('id', $id)->delete();
        return redirect()->route('admin.home');
    }

    public function plandestroy($id)
    {
        $places = Hall::find($id)->places;
        foreach($places as $place) 
        {
            $place->delete();
        }
        return redirect()->route('admin.home');
    }
}
