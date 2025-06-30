<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{

    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name_service',
        'city',
        'address',
        'phone',
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function owners(): HasMany
    {
        return $this->hasMany(Owner::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mechanic(): HasMany
    {
        return $this->hasMany(Mechanic::class);
    }
}
