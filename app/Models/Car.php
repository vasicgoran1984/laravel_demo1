<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    protected $fillable = [
        'type_id',
        'transmission_id',
        'fuel_id',
        'chassis_number',
        'engine_number',
        'year',
        'plate_number',
        'volume',
        'power',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
