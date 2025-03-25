<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'code',
      'flight_id',
      'flight_class_id',
      'user_id',
      'name',
      'phone',
      'email',
      'total_passengers',
      'promo_code_id', 
      'payment_status',
      'subtotal',
      'grandtotal',
    ];
}
