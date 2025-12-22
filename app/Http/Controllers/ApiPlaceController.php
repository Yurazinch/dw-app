<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaceRequest;
use App\Models\Place;
use App\Models\Hall;

class ApiPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Place::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaceRequest $request)
    {
        $chairs = $request->chairs;
        $data = [];        
        foreach($chairs as $chair) {            
            $data[] = [
            'hall_id' => Hall::where('name', $chair['hall'])->value('id'),
            'row' => $chair['row'],
            'place' => $chair['place'],
            'type' => $chair['type'],
            'price' => $chair['price'],
            ];
        }
        return Place::insert($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return Hall::where('id', $id)->places();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaceRequest $request)
    {
        $chairs = $request->chairs;
        $data = [];        
        foreach($chairs as $chair) {
            $id = Hall::where('name', $chair['hall'])->value('id');                     
            $data[] = [            
            'type' => $chair['type'],
            'price' => $chair['price'],
            ];
        }
        return Place::where('hall_id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return Place::where('hall_id', $id)->delete();
    }
}
