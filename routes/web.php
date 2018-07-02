<?php

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




Route::resource('/', 'Propertiestobay');

Route::resource('/info', 'PropatiesInfo');




Route::group(['middleware'=>['auth']],function() {

    Route::resource('/pro', 'PropatiesHomeUsers');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
 * made a class middleware
 * to check is the user is admin
 * is a boolean
 * so it will return true or false
 * i register the class on the  Kernel
 */
Route::group(['middleware'=>['auth','is_admin']],function(){

    Route::resource('/admin/proparties', 'Proparties');

    Route::resource('/admin/tonws', 'Tonws');

    Route::get('/admin', 'Admin@index');

    Route::resource('/admin/api', 'Api');





});


