<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Place;
use App\Models\Seance;

class Hall extends Model
{
    protected $table = 'halls';
    
    protected $fillable = ['name'];

    public function places(): HasMany
    {
        return $this->hasMany(Place::class);
    }

    public function seanes(): HasMany
    {
        return $this->hasMany(Seance::class);
    }
}
