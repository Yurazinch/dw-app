<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Models\Hall;
use App\Models\Film;

class SeanceCreateController extends Controller
{
    /**
     * Показать форму создания нового ресурса.
     */
    public function createseance()
    {
        $halls = Hall::get();
        $films = Film::get();
        return view('/admin/addseance', ['halls' => $halls, 'films' => $films]);
    }
}
