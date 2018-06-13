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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/admin/search','SearchController@load'); 

Route::group(['middleware'=>'admin'], function(){
Route::name('admin.')->group(function () {
    Route::delete('/admin/userdelete/{id}','UserController@destroy')->name('userdelete');
	Route::get('/admin/user','UserController@index')->name('userlist');
});	});

Route::group(['middleware'=>'auth'], function(){
    Route::name('tutor.')->group(function () {
        Route::get('/tutor/{username}', 'TutorController@show')->name('profile');
});
    Route::name('murid.')->group(function () {
        Route::get('/murid/{username}', 'MuridController@show')->name('profile');
});
    Route::get('/murid/{id}/follow', 'TutorController@followUser')->name('follow');
    Route::get('/murid/{id}/unfollow', 'TutorController@unFollowUser')->name('unfollow');

});