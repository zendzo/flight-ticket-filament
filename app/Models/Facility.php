<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'images',
        'description',
    ];

    public function classes() : BelongsToMany
    {
        return $this->belongsToMany(FlightClass::class, 'flight_class_facility', 'facility_id', 'flight_class_id');
    }
}
