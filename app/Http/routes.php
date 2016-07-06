<?php

/** general */
Route::get('home', array('as' => 'home', 'uses' => function () {
    return view('home');
}));
Route::get('/', function () {
    return view('welcome');
});
Route::get('logout', 'AuthController@logout');


/** facebook javascript display */
Route::get('facebook', function () {
    return view('facebook');
});

/** Facebook */
Route::get('auth/facebook', 'FacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');

/** Github */
Route::get('auth/github', 'GithubController@redirectToProvider');
Route::get('auth/github/callback', 'GithubController@handleProviderCallback');

/** Twitter */
Route::get('auth/twitter', 'TwitterController@redirectToProvider');
Route::get('auth/twitter/callback', 'TwitterController@handleProviderCallback');

Route::get('test',function(){
    return view('persist');
});

