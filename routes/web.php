<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/log', [App\Http\Controllers\HomeController::class, 'index'])->name('log');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/count', [App\Http\Controllers\BasketController::class, 'show_from_basket'])->name('show_from_basket');

Route::post('/connected', [App\Http\Controllers\AjaxController::class, 'connected'])->name('users_connected');
Route::post('/nbcommands', [App\Http\Controllers\AjaxController::class, 'commandNumber'])->name('number_commands');
Route::post('/bigcommand', [App\Http\Controllers\AjaxController::class, 'bigCommand'])->name('bigest_command');

Route::group(['prefix'=>'/admin'],function()
{
    Route::post('/',[App\Http\Controllers\AdminController::class,'create_product'])->name('create_product');
    
});
Route::group(['prefix'=>'/catalog'],function()
{
    Route::get('/',[App\Http\Controllers\ProductController::class,'show_all_products'])->name('show_all_products');
    Route::get('/remove/{product}',[App\Http\Controllers\AdminController::class,'remove_product'])->name('remove_product');
    Route::get('/{id}',[App\Http\Controllers\ProductController::class,'show_product'])->name('show_product');
    //Route::get('/basket/{product}',[App\Http\Controllers\BasketController::class,'fill_basket'])->name('fill_basket');

});
Route::group(['prefix'=>'/basket'],function()
{
Route::get('/basket/{product}',[App\Http\Controllers\BasketController::class,'fill_new_basket'])->name('fill_new_basket');
Route::get('/', [App\Http\Controllers\BasketController::class, 'show_basket'])->name('show_basket');
Route::post('/{product}',[App\Http\Controllers\ProductController::class,'update_product'])->name('update_product');
Route::get('/pay/pay/{total}/{id}/{number}', [App\Http\Controllers\BasketController::class, 'pay'])->name('pay');
Route::post('/remove/product/{id}',[App\Http\Controllers\BasketController::class,'remove_product'])->name('remove_basket_product');
Route::get('/delete/{id}',[App\Http\Controllers\BasketController::class,'delete_product'])->name('delete_basket_product');

});