<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;

$id= Auth::id();
       
        $number=DB::table('baskets')->where('user_id',$id)
        ->sum(DB::raw('(product_number)'));
        echo $number;
        
        ?>