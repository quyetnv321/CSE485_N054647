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
    return view('home');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/game', function () {
    return view('game');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', function () {
        return view('admin.login');
    });
    Route::get('/manage', function () {
        return view('admin.manage');
    });
});
Route::post("register", function() {
    $rules = array(
        "userName" => "required|min:3",
        "pass" => "required|min:6",
        "email" => "required|email",
        "phone" => "required|min:9",
        "full_name" => "required|min:5"
    );
    if(!Validator::make(Input::all(),$rules)->fails()) {
        $user = new User();
        $user->userName = Input::get("userName");
        $user->pass = md5(sha1(Input::get("pass")));
        $user->email = Input::get("email");
        $user->full_name = Input::get("full_name");
        $user->birthday = Input::get("birthday");
        $user->gender = Input::get("gender");
        $user->phone = Input::get("phone");
        $user->save();
        echo "Đăng ký thành công";
    }
});