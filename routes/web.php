<?php
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
Route::post("/game/question", "GameController@getQuestion");
Route::post("/game/question/UpdatePassQuestion", "GameController@UpdatePassQuestion");
Route::post("/game/scores", "GameController@Scores");

