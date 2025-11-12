<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $table = 'halls';
    
    protected $fillable = ['name'];

    public function places() 
    {
        return $this->hasMany(Place::class);
    }

    public function seanes() 
    {
        return $this->hasMany(Seance::class);
    }
}
