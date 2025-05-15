<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

}
