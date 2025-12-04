<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\Film;
use App\Models\Seance;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function addlists(Hall $halls, Film $films, Seance $seances): View
    {
        $halls = Hall::get();
        $films = Film::get();
        $seances = Seance::get();
        return view('/admin/index', ['halls' => $halls, 'films' => $films, 'seances' => $seances]);
    }
}
