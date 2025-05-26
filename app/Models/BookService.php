<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookService extends Model
{
    protected $fillable = [
        'car_id',
        'owner_id',
        'service_id',
        'date',
        'kilometers',
    ];

    public function cars(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function owners(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
