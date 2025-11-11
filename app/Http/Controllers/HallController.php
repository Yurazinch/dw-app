<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Отобразить список ресурса.
     */
    public function index()
    {
        $halls = Hall::get();
        return route('admin/index', $halls);
    }

    /**
     * Показать форму создания нового ресурса.
     */
    public function create()
    {
        return route('addhall');
    }

    /**
     * Сохранить вновь созданный ресурс в хранилище.
     */
    public function store(Request $request)
    {
        $hall = new Hall;
        $hall->name = $request->name;
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
