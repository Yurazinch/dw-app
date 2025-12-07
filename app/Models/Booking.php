<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Place;
use App\Models\Seance;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = [
        'place_id',
        'seance_id',
    ];

    public function places(): HasMany
    {
        return $this->hasMany(Place::class, 'place_id');
    }

    public function seances(): HasOne
    {
        return $this->hasOne(Seance::class, 'seance_id');
    }
}
