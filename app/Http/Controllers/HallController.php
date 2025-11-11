<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Отобразить список ресурса.
     */
    public function index(): View
    {
        $halls = Hall::all();
        return route('admin.index', ['halls' => $halls]);
    }

    /**
     * Показать форму создания нового ресурса.
     */
    public function create()
    {
        //
    }

    /**
     * Сохранить вновь созданный ресурс в хранилище.
     */
    public function store(Request $request)
    {
        $hall = new Hall;
        $hall->name = $request->value;
        $hall->save;
        return redirect('admin/index');
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
    public function destroy(Hall $hall)
    {
        //
    }
}
