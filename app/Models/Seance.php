<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Hall;
use App\Models\Film;
use App\Models\Booking;

class Seance extends Model
{
    protected $table = 'seances';
    
    protected $fillable = [
        'hall_id',
        'film_id',
        'start',
        'width',
        'fin',
    ]; 
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function hall(): BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
