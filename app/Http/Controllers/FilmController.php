<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Отобразить список ресурса.
     */
    public function index()
    {
        //
    }

    /**
     * Показать форму создания нового ресурса.
     */
    public function create()
    {
        return route('admin/addfilm');
    }

    /**
     * Сохранить вновь созданный ресурс в хранилище.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Отобразить указанный ресурс.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Показать форму редактирования указанного ресурса.
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Обновить указанный ресурс в хранилище.
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Удалить указанный ресурс из хранилища.
     */
    public function destroy(Film $film)
    {
        //
    }
}
