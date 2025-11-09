<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'films';
    protected $fillable = [
        'name',
        'description',
        'country',
        'duration',
        'poster',
    ];

    public function seances() 
    {
        return $this->hasMahy(Seance::class);
    }
}
