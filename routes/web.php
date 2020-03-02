<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::resource('tstep', 'TstepController', ['except' => ['show']]);
Route::resource('tstep2', 'Tstep2Controller', ['except' => ['show']]);
Route::group(['middleware' => ['admin']], function() {
    Route::resource('ztstep', 'ZeanTstepContrller', ['except' => ['show']]);
    Route::resource('blogs', 'BlogController', ['except' => ['show']]);
    Route::resource('youtube', 'YoutubeController', ['except' => ['show']]);
    Route::resource('analyze', 'AnalyzeController', ['except' => ['show']]);
    Route::resource('zean', 'ZeanController', ['except' => ['show']]);
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('setup', 'SetupController', ['except' => ['show']]);
    Route::resource('lotto', 'LottoController', ['except' => ['show']]);
    Route::resource('lotto_lao', 'LottolaoController', ['except' => ['show']]);

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('ckeditor', 'CkeditorController@index');
    Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');
});

Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index');
    });
});
