<?php
Route::get('/', 'LoginController@home');
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
    Route::get('/chart', 'LoginAdminController@Chart')->name('chart.admin');
    Route::post('/up-question', 'AdminController@UploadQuestion')->name('upQuestion.admin');
    Route::post('/get-chart', 'AdminController@GetChartRoom');
    Route::get('/summary', 'LoginAdminController@Summary')->name('summary.admin');
    Route::post('/get-summary', 'AdminController@Sum');
    Route::get('/reward', 'LoginAdminController@Reward')->name('reward.admin');
    Route::post('/reward-random', 'AdminController@upRewardRandom');
    Route::post('/reward-vip', 'AdminController@upRewardVip');

});
Route::post("register", ["as"=>"register","uses"=>"RegisterController@index"]);
Route::post("/game/question", "GameController@getQuestion");
Route::post("/game/question/UpdatePassQuestion", "GameController@UpdatePassQuestion");
Route::post("/game/scores", "GameController@Scores");
Route::post("/game/user", "GameController@getDataUser");
Route::post("/game/user-question-day", "GameController@UpdateQuestionsDay");
Route::post("/game/chart-room-user", "GameController@GetChartRoomUser");



