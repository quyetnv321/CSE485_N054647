<?php
	Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', function () {
        return view('admin.login');
    });
    Route::get('/manage', function () {
        return view('admin.manage');
    });
});

?>