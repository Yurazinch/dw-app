<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Film;

class SeanceCreateController extends Controller
{
    public function createseance()
    {
        return view('/admin/addseance');
    }
}
