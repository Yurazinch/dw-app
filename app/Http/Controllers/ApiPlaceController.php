<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Place;
use App\Models\Hall;

class ApiPlaceController extends Controller
{
    public function index()
    {
        return Place::get();
    }

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

    public function show(int $id)
    {
        return Hall::where('id', $id)->places();
    }

    public function update(UpdatePlaceRequest $request, $hall)
    {
        $prices = $request->prices;
        
        foreach($prices as $price) {
            if($price['type'] === 'standart') {
                $price_std = $price['price'];
            } elseif($price['type'] === 'vip') {
                $price_vip = $price['price'];
            }
        }

        $hall_id = Hall::where('name', $hall)->value('id');
        Place::where('hall_id', $hall_id)->where('type', 'standart')->update(['price' => $price_std]);
        Place::where('hall_id', $hall_id)->where('type', 'vip')->update(['price' => $price_vip]);
         
        return Place::where('hall_id', $hall_id)->get();
    }

    public function destroy(int $id)
    {
        return Place::where('hall_id', $id)->delete();
    }
}