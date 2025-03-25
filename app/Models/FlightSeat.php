<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlightSeat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'flight_id',
        'row',
        'column',
        'class_type',
        'is_available',
    ];
}
