<?php

use App\Cat;
use App\Notifications\LinkZoom;
use App\User;

use Illuminate\Notifications\ChannelManager;
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

Route::get('getuserdata/{id}', 'AjaxController@getuserdata');
Route::get('getuserdatafrommonth', 'AjaxController@getuserdatafrommonth');
Route::get('dashhome', 'AjaxController@dashhome');

Route::get('/', 'SiteController@index');


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
