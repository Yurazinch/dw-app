<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SeanceCreateController;
use App\Http\Controllers\SeanceController;
use App\Http\Middleware\SalesIsActive;


Route::view('/', 'index')->middleware(SalesIsActive::class)->name('index');

Route::view('/close', 'welcome');

//Route::get('/', [InController::class, 'in']);

Route::view('/admin', 'admin/login');

Route::post('/admin/auth', [LoginController::class, 'authenticate'])->name('admin.authenticate');

Route::view('/home', 'admin/index')->name('admin.home');

Route::get('/hall/create', [HallController::class, 'create'])->name('hall.create');

Route::post('/hall', [HallController::class, 'store'])->name('hall.store');

Route::get('/hall/{name}', [HallController::class, 'destroy'])->name('hall.remove');

Route::get('/removehall/{name}', function($name) {
    return view('admin/removehall', ['name' => $name]);
})->name('hall.toremove');

Route::get('/removeplan/{id}', [HallController::class, 'plandestroy'])->name('plan.remove');

Route::get('/film/create', [FilmController::class, 'create'])->name('film.create');

Route::post('/film', [FilmController::class, 'store'])->name('film.store');

Route::get('/removefilm/{name}', function($name) {
    return view('admin/removefilm', ['name' => $name]);
})->name('film.toremove');

Route::get('/film/{name}', [FilmController::class, 'destroy'])->name('film.remove');

Route::get('/seance/create', [SeanceCreateController::class, 'createseance'])->name('seance.create');

Route::post('/seance', [SeanceController::class, 'store'])->name('seance.store');

Route::post('/seance/{seance}', [SeanceController::class, 'update'])->name('seance.update');

Route::get('/{seance}', [SeanceController::class, 'show'])->name('seance.show');

Route::get('/removeseance/{id}', function($id) {
    return view('admin/removeseance', ['id' => $id]);
})->name('seance.toremove');

Route::get('/seance/{id}', [SeanceController::class, 'destroy'])->name('seance.remove');