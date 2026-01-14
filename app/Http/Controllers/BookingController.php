<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Сохранить вновь созданный ресурс в хранилище.
     */
    public function store(Request $request)
    {
        $validated  = request->validate();
        dd($validated);
        //Booking::insert($request->toBooking);
    }

    /**
     * Отобразить указанный ресурс.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Показать форму редактирования указанного ресурса.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Обновить указанный ресурс в хранилище.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Удалить указанный ресурс из хранилища.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
