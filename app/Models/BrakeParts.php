<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrakeParts extends Model
{
    protected $fillable = [
        'model_type_id',
        'part_group_code',
        'producer',
        'part_number',
        'position',
    ];
}
