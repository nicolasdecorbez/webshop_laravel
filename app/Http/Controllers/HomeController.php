<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
      public function index()
      {
        
        $id= Auth::id();
        $enable=User::where('id',$id)
        ->updateOrCreate(
          ['id' => $id],['active' => 1]
        );
       
        if($id==1)
        {
        return redirect()->route('admin');
        } 
        else{
        return redirect()->route('show_all_products');;
        }
    }
    public function admin()
    {
        
        return view('admin');
        
    }
    public function home()
    {
        
        return view('home');
        
    }
}

