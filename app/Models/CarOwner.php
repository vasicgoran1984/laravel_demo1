<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarOwner extends Model
{
    protected $fillable = [
        'car_id',
        'owner_id',
    ];
}
