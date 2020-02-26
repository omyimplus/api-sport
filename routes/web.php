<?php
Route::get('/test', function() {
    $n='111111 222222 333333 444444 555555';
    $n = preg_replace('/[^0-9]/', '', $n);
    $x='';
    $j = 'sory!';
    for($i=0;$n!='';$i++) {
        $c=substr($n,0, 6);
        if ($c == '111121') { $j = 'jackpot!'; }
        $n=str_replace($c,'',$n);
    }
    return $j;
});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::resource('tstep', 'TstepController', ['except' => ['show']]);
Route::group(['middleware' => ['admin']], function() {
    Route::resource('ztstep', 'ZeanTstepContrller', ['except' => ['show']]);
    Route::resource('blogs', 'BlogController', ['except' => ['show']]);
    Route::resource('youtube', 'YoutubeController', ['except' => ['show']]);
    Route::resource('analyze', 'AnalyzeController', ['except' => ['show']]);
    Route::resource('zean', 'ZeanController', ['except' => ['show']]);
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('setup', 'SetupController', ['except' => ['show']]);
    Route::resource('lotto', 'LottoController', ['except' => ['show']]);

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
