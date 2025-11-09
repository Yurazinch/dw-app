<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = [
        'place_id',
        'seance_id',
    ];

    public function places() 
    {
        return $this->hasMany(Place::class);
    }

    public function seances() 
    {
        return $this->hasOne(Seance::class);
    }
}
