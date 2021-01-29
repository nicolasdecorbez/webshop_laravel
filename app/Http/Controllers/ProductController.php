<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    


    public function show_all_products()
    {
        $product= DB::table('products')
        ->select('id','title','image')->get();          
        
        return view('catalog',["product"=>$product]);

    }
    
      public function show_product($id)
    {
        $product= DB::table('products')
        ->select('id','title','image','description','category','price','buy')->where('id','=',$id)->get(); 
        return view('product',["product"=>$product]);
      
  }
      public function update_product(Request $request,$id)
      {
        $product= DB::table('products')
        ->where('id','=',$id)
        ->update([
          'title' => $request->name,
          'image' => $request->image,
          'description' => $request->description,
          'price' => $request->price,
          'category' => $request->group,
          'stock' => $request->stock,

        ]);
        return redirect()->route('show_product',[$id]);

      }
}
