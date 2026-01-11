<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'description' => ['required', 'string', 'min:3', 'max:225'],
            'duration' => ['required', 'string', 'min:2', 'max:3'],
            'country' => ['required', 'string', 'min:3', 'max:50'],
            'poster' => ['required', 'image'],
        ]);
        $film = new Film;
        $film->name = $validated['name'];
        $film->description = $validated['description'];
        $film->duration = $validated['duration']; 
        $film->country = $validated['country'];
        $film->poster = Storage::disk('public')->put('posters', $validated['poster']);
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
    public function destroy(Film $film, $name)
    {
        $poster = Film::where('name', $name)->value('poster');
        Storage::delete('storage/$poster');
        $film = Film::where('name', $name)->delete();
        return redirect()->route('admin.home');
    }
}
