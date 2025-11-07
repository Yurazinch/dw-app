<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $table = 'halls';
    protected $fillable = [
        'number',
        'rows',
        'placesrow',
    ];
    public function rows() 
    {
        return $this->hasMany(Row::class, 'hall_id', 'id');
    }
}
