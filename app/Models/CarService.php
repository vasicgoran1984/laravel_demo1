<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarService extends Model
{
    protected $fillable = [
        'book_service_id',
        'service_id',
        'small_service_name',
        'big_service_name',
        'brakes_service_name',
        'oil',
        'oil_name',
        'oil_filter',
        'air_filter',
        'inner_filter',
        'fuel_filter',
        'brake_pads_front',
        'disc_front',
        'brake_pads_rear',
        'disc_rear',
        'front_left_cylinder',
        'front_right_cylinder',
        'rear_left_cylinder',
        'rear_right_cylinder',
        'belt',
        'water_pump',
        'alt_pulley',
        'spanner',
        'roll',
        'outside_belt',
        'outside_spanner',
        'description',
        'kilometers',
        'price',
    ];
}
