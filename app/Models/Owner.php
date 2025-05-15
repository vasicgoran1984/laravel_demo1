<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{

    protected $fillable = [
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

}
