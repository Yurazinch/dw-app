<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
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
        return route('admin/addseance');
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
    public function show(Seance $seance)
    {
        //
    }

    /**
     * Показать форму редактирования указанного ресурса.
     */
    public function edit(Seance $seance)
    {
        //
    }

    /**
     * Обновить указанный ресурс в хранилище.
     */
    public function update(Request $request, Seance $seance)
    {
        //
    }

    /**
     * Удалить указанный ресурс из хранилища.
     */
    public function destroy(Seance $seance)
    {
        //
    }
}
