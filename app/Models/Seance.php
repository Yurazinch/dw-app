<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $table = 'seances';
    protected $fillable = [
        'hall_id',
        'film_id',
        'start',
        'finish',
    ];

    public function halls() 
    {
        return $this->belongsTo(Hall::class, 'hall_id', 'id');
    }

    public function films() 
    {
        return $this->hasOne(Film::class);
    }
}
