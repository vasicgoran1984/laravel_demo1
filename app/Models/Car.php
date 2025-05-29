<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    protected $fillable = [
        'type_id',
        'transmission_id',
        'fuel_id',
        'service_id',
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

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function bookService(): HasMany
    {
        return $this->hasMany(BookService::class);
    }


}
