<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $table= 'buy';

    protected $fillable = [
        'product_id',
        'price',
        'user_id',
        'total',
        'product_number'
    ];
}
