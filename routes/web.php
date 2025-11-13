<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HallController;

Route::view('/', 'index');

Route::view('/admin', 'admin/login');

Route::post('/admin/auth', [LoginController::class, 'authenticate'])->name('admin.authenticate');

Route::view('/admin/home', 'admin/index')->name('admin.home');

Route::get('/admin/hall/create', [HallController::class, 'create'])->name('hall.create');

Route::post('/admin/hall/store', [HallController::class, 'store'])->name('hall.store');

Route::get('/admin/hall/remove/{name}', [HallController::class, 'destroy'])->name('hall.remove');

Route::get('/admin/hall/', [HallController::class, 'index'])->name('hall.index');

Route::get('/admin/hall/{name}', function($name) {
    return view('admin/removehall', ['name' => $name]);
})->name('hall.toremove');