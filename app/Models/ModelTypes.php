<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'name',
        'start_year',
        'end_year',
    ];
}
