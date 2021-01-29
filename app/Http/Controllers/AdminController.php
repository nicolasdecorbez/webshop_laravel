<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create_product(Request $request)
    {

        $product = new Product;
       
        $product->title = $request->name;
        $product->image = $request->image;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->group;
        $product->stock += 1;
        $product->buy = 0;
        $product->is_enabled = 1;
        
        $product->save();
        

        return view ('admin');
    }
    public function remove_product($product_id)
    {
        $basket = DB::table('baskets')->where('product_id',$product_id)->delete();
        $product = DB::table('products')->where('id',$product_id)
        ->delete();
        return redirect()->route('show_all_products');
    }

}
