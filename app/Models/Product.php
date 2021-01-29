<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table= 'products';
    
    public function basket() {
        
        return $this->hasMany('App\Models\Basket', 'product_id', 'id');
        }
    }