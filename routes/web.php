<?php

use App\Notifications\LinkZoom;
use App\User;

use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Route;
use App\Mail\OrderMail;

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


Route::get('orderMail', function(){
    Mail::to("abdelrahmaan3@gmail.com")->send(new OrderMail(5));
    return "asdsadasdasdsadsadasd";
});


Route::get('/', 'SiteController@index');
Route::get('search', 'SiteController@search');

Route::get('page/{titl}', 'SiteController@pageShow');
Route::get('privacy', 'SiteController@privacy');
Route::get('contact', 'SiteController@contact');
Route::get('product/{name}', 'SiteController@product');

Route::get('programs', 'SiteController@programs');
Route::get('bags', 'SiteController@bags');
Route::get('studies', 'SiteController@studies');
Route::get('products', 'SiteController@products');
Route::get('teacher/{id}', 'SiteController@teacher');
Route::get('blog/{name}', 'SiteController@blog');

Route::get('order_study', 'SiteController@order_study');
Route::post('order_study', 'AjaxController@order_study');


Route::get('video/', 'AjaxController@video');





Route::post('coache', 'AjaxController@coache');
Route::post('advisor', 'AjaxController@advisor');
Route::post('partner', 'AjaxController@partner');
Route::post('employee', 'AjaxController@employee');
Route::post('email', 'AjaxController@email');




Route::get('/clear', function () {
    Artisan::call('config:cache');

    //Artisan::call('route:cache');

    Artisan::call('cache:clear');

    Artisan::call('view:clear');
    return "done";
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('thanks', 'SiteController@thanks');
    Route::get('notifications', 'SiteController@notifications');

    Route::get('notification/{id}', 'SiteController@notification_read');
    Route::post('/userUpdate', 'AjaxController@userUpdate');
    Route::get('download', 'AjaxController@download');

    Route::get('videoWatch', 'AjaxController@videoWatch');


    //cart and checkout
    
    Route::get('cart', 'SiteController@cart');
    Route::get('delete_cart', 'AjaxController@delete_cart');
    Route::get('delete_all_cart', 'AjaxController@delete_all_cart');
    Route::get('add_to_cart', 'AjaxController@add_to_cart');
    Route::get('update_cart', 'AjaxController@update_cart');
    Route::get('checkout', 'SiteController@checkout');
    Route::post('buy_now', 'AjaxController@buy_now');
    //cart and checkout END------------------

    // exam and submit
    Route::get('exam/{name}', 'SiteController@exam');
    Route::post('subExam', 'AjaxController@subExam');

    //evaluation
    Route::get('evaluation', 'AjaxController@evaluation');


    Route::get('createOrder', function(){
        return auth()->user()->createOrder();
    });

    Route::get('getAllOrder', function(){
        return auth()->user()->getAllOrder();
    });

});

Route::get('/home', 'SiteController@index')->name('home');
Route::get('/test', 'SiteController@test')->name('test');
