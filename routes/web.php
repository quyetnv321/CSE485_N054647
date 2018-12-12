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

Route::get('home', function () {
    return view('home');
});
Route::get('logout', 'LoginController@logout');
Route::get('/register', function () {
    return view('register');
});

    Route::get('game', 'LoginController@status');
    Route::post("game", ["as"=>"home","uses"=>"LoginController@index"]);

Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', function () {
        return view('admin.login');
    });
    Route::get('/manage', function () {
        return view('admin.manage');
    });
});
Route::post("register", ["as"=>"register","uses"=>"RegisterController@index"]);
// Route::post('home', 'LoginController@index')->name('home');
