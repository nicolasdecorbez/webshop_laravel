<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
use App\Models\Buy;


class BasketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fill_basket($product_id)
    {
        $product=DB::table('products')->select('id','price','title')->where('id','=',$product_id)->get();
      
        
        
        $id= Auth::id();
        
        foreach($product as $product){

        if($basket=DB::table('baskets')->where([
            ['user_id',$id],
            ['product_id',$product_id]
        ])->exists())
        {
            $new_product=Basket::where('user_id',$id)
            ->updateOrCreate(
                ['product_id' => $product_id],
                
                [
                'product_id' => $product_id ,
                'price' => $product->price ,
                'user_id' => $id ,
                'product_title' => $product->title
                ]);
            
        } else {
            $basket = new Basket;
       
        $basket->price = 0;
        $basket->product_number = 0 ;
        $basket->user_id = $id;
        $basket->product_id = $product_id;
        
        $basket->save();

        
        return redirect()->route('fill_basket',[$product_id]);

        }
        
        
    }
    $increment=DB::table('baskets')->where([
        ['user_id',$id],
        ['product_id',$product_id]
    ])->increment('product_number');
    
    
        return redirect()->route('show_all_products');
    }
    public function show_basket()
    {
        $total=0;
        $elements=0;
        $id= Auth::id();
        $basket=DB::table('baskets')
        ->where('user_id',$id)
        ->select('product_id','product_title','price','product_number')->get();

        $total=DB::table('baskets')->where('user_id',$id)
        ->sum(DB::raw('(price * product_number)'));

        $elements=DB::table('baskets')->where('user_id',$id)
        ->count();
       


        return view('basket',["basket"=>$basket],["total"=>$total,"elements"=>$elements]);
    }

    public function remove_product(Request $request,$product_id)
    {
        $id=Auth::id();
        
    
        
        
        $basket = DB::table('baskets')->where([
            ['user_id',$id],
            ['product_id',$product_id]
        ])->update([
            'product_number'=>$request->number
        ]);
        $number=DB::table('baskets')->where([
            ['user_id',$id],
            ['product_id',$product_id]
        ])->select('product_number')->get();

        foreach($number as $number)
        {
            if($number->product_number <= 0)
            {
                $basket = DB::table('baskets')->where('product_id',$product_id)->delete();
            }
    }
        return redirect()->route('show_basket');
    }

    public function delete_product($product_id)
    {
        $id=Auth::id();

    $basket=DB::table('baskets')->where([
        ['user_id',$id],
        ['product_id',$product_id]
    ])->delete();
    
    return redirect()->route('show_basket');
}
    public function pay($total,$id,$number)
    {
        $user_id = Auth::id();
        
        $basket=DB::table('products')->where('id',$id)
        ->select('id','price')->get();
        
        foreach($basket as $basket){
            $pay = new Buy;
       
            $pay->product_number = $number ;
            $pay->user_id = $user_id;
            $pay->product_id = $id;
            $pay->total= $total;

        $pay->save();
        }
    }

   


    public function fill_new_basket($id){
        
        if($product=DB::table('products')->where('id',$id)->exists())
            {
        $product=DB::table("products")->where('id',$id)
        ->select('id','title','price')->get();

        
        return $product;
            }
    }
}
