<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';

    protected $fillable = [
        'hall_Id',
        'place',
        'row',
        'status',
        'price',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function halls() 
    {
        return $this->belongsTo(Hall::class, 'hall_id', 'id');
    }

    public function seances() 
    {
        return $this->belongsTo(Seance::class, 'seance_id', 'id');
    }
}
