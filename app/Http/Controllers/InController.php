<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class InController extends Controller
{
    public function in(bool $sales): View
    {
        $this->sales = $sales;
        if($this->sales) {
            return view('/index');
        } else {
            return view('/welcome');
        }
    }
}
