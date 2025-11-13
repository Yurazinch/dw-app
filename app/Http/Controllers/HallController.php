<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;

class HallController extends Controller
{
    /**
     * Отобразить список ресурса.
     */
    public function index(): View
    {
        $halls = Hall::get();
        return view('admin/index', ['halls' => $halls]);
    }

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
            'name' => 'required|string|max:255',
        ]);
        
        $hall = new Hall;
        $hall->name = $request->name;     
        $hall->save();
        return redirect()->route('hall.index');
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
    public function destroy(Hall $hall, $name)
    {
        $hall = Hall::where('name', $name)->delete();
        return redirect()->route('hall.index');
    }
}
