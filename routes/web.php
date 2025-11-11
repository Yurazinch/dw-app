<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HallController;

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

Route::get('admin/addhall', [HallController::class, 'create'])->name('createhall');

Route::post('admin/addhall', [HallController::class, 'store'])->name('addhall');

Route::post('admin/removehall/{name}', [HallController::class, 'destroy'])->name('removehall');

Route::get('admin/components.hall-create', [HallController::class, 'index'])->name('components.hall-create');