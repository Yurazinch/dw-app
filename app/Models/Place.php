<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Hall;
use App\Models\Booking;

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

    public function halls(): BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }

    public function boockings(): BelongsTo
    {
        return $this->belogsTo(Boocking::class);
    }
}
