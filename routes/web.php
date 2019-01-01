<?php
Route::get('home', 'LoginController@home');
Route::get('game', 'LoginController@game')->name('game');
Route::post('home/login', 'LoginController@checkLogin');
Route::get('home/logout', 'LoginController@logout');

Route::get('/register', function () {
    return view('register');
});
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'LoginAdminController@GetLogin');
    Route::get('/login', 'LoginAdminController@GetLogin')->name('admin.login');;
    Route::get('/manage', 'LoginAdminController@manage')->name('admin.manage');
    Route::post('/check-admin', 'LoginAdminController@CheckAdminLogin')->name('login.admin');
    Route::get('/logOut', 'LoginAdminController@logout')->name('logout.admin');
    Route::post('/up-question', 'AdminController@UploadQuestion')->name('upQuestion.admin');

});
Route::post("register", ["as"=>"register","uses"=>"RegisterController@index"]);
Route::post("/game/question", "GameController@getQuestion");
Route::post("/game/question/UpdatePassQuestion", "GameController@UpdatePassQuestion");
Route::post("/game/scores", "GameController@Scores");
Route::post("/game/user", "GameController@getDataUser");
Route::post("/game/user-question-day", "GameController@UpdateQuestionsDay");


