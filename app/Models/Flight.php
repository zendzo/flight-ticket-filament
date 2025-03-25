<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'airline_id',
        'flight_number',
    ];

    public function airline() : BelongsTo
    {
        return $this->belongsTo(Airline::class);
    }

    public function segments() : HasMany
    {
        return $this->hasMany(FlightSegment::class);
    }

    public function classes() : HasMany
    {
        return $this->hasMany(FlightClass::class);
    }

    public function seats() : HasMany
    {
        return $this->hasMany(FlightSeat::class);
    }

    public function transactions() : HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
