<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HallController;

Route::view('/', 'index');

Route::view('/admin', 'admin/login');

Route::post('admin/auth', [LoginController::class, 'authenticate'])->name('admin.authenticate');

Route::view('/admin/home', 'admin/index')->name('admin.home');

Route::get('/admin/hall/create', [HallController::class, 'create'])->name('hall.create');

Route::post('/admin/hall/store', [HallController::class, 'store'])->name('hall.store');

Route::post('/admin/hall/remove/{name}', [HallController::class, 'destroy'])->name('hall.remove');

