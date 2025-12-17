<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SeanceCreateController;
use App\Http\Controllers\SeanceController;

Route::get('/welcome', function() {
    return view('/welcome');
});

Route::view('/', 'index');

Route::view('/admin', 'admin/login');

Route::post('/admin/auth', [LoginController::class, 'authenticate'])->name('admin.authenticate');

Route::get('/admin/lists', [AdminController::class, 'addlists'])->name('admin.lists');

Route::view('/home', 'admin/index')->name('admin.home');

Route::get('/hall/create', [HallController::class, 'create'])->name('hall.create');

Route::post('/hall', [HallController::class, 'store'])->name('hall.store');

Route::delete('/hall/{name}', [HallController::class, 'destroy'])->name('hall.remove');

Route::get('/admin/hall/{name}', function($name) {
    return view('admin/removehall', ['name' => $name]);
})->name('hall.toremove');

Route::get('/admin/film/create', [FilmController::class, 'create'])->name('film.create');

Route::post('/admin/film/store', [FilmController::class, 'store'])->name('film.store');

Route::get('/admin/film/{name}', function($name) {
    return view('admin/removefilm', ['name' => $name]);
})->name('film.toremove');

Route::get('/admin/film/remove/{name}', [FilmController::class, 'destroy'])->name('film.remove');

Route::get('/admin/seance/create', [SeanceCreateController::class, 'createseance'])->name('seance.create');

Route::post('/admin/seance/store', [SeanceController::class, 'store'])->name('seance.store');

Route::post('/admin/seance/update', [SeanceController::class, 'update'])->name('seance.update');

Route::get('/admin/seance/show/{id}', [SeanceController::class, 'show'])->name('seance.show');

Route::get('/admin/seance/toremove/{id}', function($id) {
    return view('admin/removeseance', ['id' => $id]);
})->name('seance.toremove');

Route::get('/admin/seance/remove/{id}', [SeanceController::class, 'destroy'])->name('seance.remove');