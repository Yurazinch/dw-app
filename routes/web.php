<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LoginController;

Route::get('/', function () 
{
    return view('index');
});

Route::get('admin', function () 
{
    return view('admin/login');
});

Route::post('admin/index', [LoginController::class, 'authenticate'])->name('admin.authenticate');

Route::get('admin/index', function ()
{
    return view('admin/index');
});
