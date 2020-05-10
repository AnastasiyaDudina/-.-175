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

Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();
Route::get('/reg', 'IndexController@RegisterUP');

Route::get('/CreateTest', 'IndexController@CreateTestOpen');
Route::post('/CreateTest', 'IndexController@CreateTest');


Route::post('/AddQuestion/{Test_id}', 'IndexController@AddQuestion');
Route::post('/CreateNewQuestion/{Test_id}', 'IndexController@CreateQuestion');
Route::post('/CreateNewQuestion/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('reg/', 'IndexController@store')->name('stat');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
