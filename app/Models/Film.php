<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Seance;

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

    public function seances(): HasMany
    {
        return $this->hasMany(Seance::class);
    }
}
