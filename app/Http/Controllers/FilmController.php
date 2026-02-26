<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Http\Requests\FilmCreateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    /**
     * Показать форму создания нового ресурса.
     */
    public function create()
    {
        return view('/admin/addfilm');
    }

    /**
     * Сохранить вновь созданный ресурс в хранилище.
     */
    public function store(FilmCreateRequest $request): RedirectResponse
    {
        
        $film = new Film;
        $film->name = $request->name;
        $film->description = $request->description;
        $film->duration = $request->duration; 
        $film->country = $request->country;
        $film->poster = Storage::disk('public')->put('posters', $request->poster);
        $film->save();

        return redirect()->route('admin.home');
        
    }

    /**
     * Отобразить указанный ресурс.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Показать форму редактирования указанного ресурса.
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Обновить указанный ресурс в хранилище.
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Удалить указанный ресурс из хранилища.
     */
    public function destroy($id)
    {
        $poster = Film::where('id', $id)->value('poster');
        Storage::delete('storage/$poster');
        $film = Film::where('id', $id)->delete();
        return redirect()->route('admin.home');
    }
}
