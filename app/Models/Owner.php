<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{

    protected $fillable = [
        'service_id',
        'first_name',
        'last_name',
        'city',
        'address',
        'phone',
        'email',
    ];

    public function carOwners(): HasMany
    {
        return $this->hasMany(CarOwner::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

}
