<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromoCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'discount',
        'valid_to',
        'max_usage',
        'is_available',
    ];

    public function transaction() : HasOne
    {
        return $this->hasOne(Transaction::class);
    }
}
