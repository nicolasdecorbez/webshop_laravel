<?php



namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Middleware;
use App\Http\Controllers;
use App\Http\Controllers\Basket;




class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
  
    
     public function register()
    {
        
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
     public function boot()
    {
     
       
    }
}
