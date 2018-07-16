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


Route::group(['middleware'=>'admin'], function(){
Route::name('admin.')->group(function () {
    Route::get('/user/cari','SearchController@search')->name('telusuri'); 
    Route::get('/admin/user/tambah','UserController@tambah')->name('usertambah');
    Route::post('/admin/user/create','UserController@create')->name('usercreate');
    Route::delete('/admin/userdelete/{id}','UserController@destroy')->name('userdelete');
	Route::get('/admin/user','UserController@index')->name('userlist');
	Route::get('/admin/user/feeds','UserController@feeds')->name('feeds');
	Route::get('/admin/user/review','UserController@review')->name('review');
});
});

Route::name('tutor.')->group(function () {
    Route::group(['middleware'=>'tutor'], function(){
        Route::get('/tutor/cari', 'TutorController@search')->name('cari');
        Route::get('/tutor/profile/edit', 'TutorController@profile')->name('profile');
        Route::post('/tutor/profile/update', 'TutorController@profileUpdate')->name('profileupdate');
        Route::get('tutor/telusuri/siswa' , 'TutorController@telusuri')->name('telusuri');
        Route::get('tutor/kata-sandi' , 'KatasandiController@katasandi')->name('katasandi');
        Route::post('tutor/kata-sandi/ganti' , 'KatasandiController@katasandiGanti')->name('katasandiganti');
        Route::post('/tutor/{username}/laporan', 'TutorController@store')->name('laporan');
        Route::delete('/laporan/delete/{id}','TutorController@destroy')->name('laporandelete');
        Route::get('/tutor/review','TutorController@review')->name('review');
    });
    
    Route::group(['middleware'=>'auth'], function(){
        Route::get('/tutor/{username}', 'TutorController@show')->name('profile');
    });
});

Route::name('murid.')->group(function () {
    Route::group(['middleware'=>'murid'], function(){
        Route::get('/siswa/cari', 'MuridController@search')->name('cari');
        Route::get('/siswa/profile/edit', 'MuridController@profile')->name('profile');
        Route::post('/siswa/profile/update', 'MuridController@profileUpdate')->name('profileupdate');
        Route::get('siswa/telusuri/tutor' , 'MuridController@telusuri')->name('telusuri');
        Route::get('siswa/kata-sandi' , 'KatasandiController@katasandi')->name('katasandi');
        Route::post('siswa/kata-sandi/ganti' , 'KatasandiController@katasandiGanti')->name('katasandiganti');
        Route::post('/review/{username}', 'RateController@create')->name('review');
        Route::post('/review/update/{username}', 'RateController@update')->name('updatereview');
    });
    
    Route::group(['middleware'=>'auth'], function(){
        Route::get('/siswa/{username}', 'MuridController@show')->name('profile');
    });
});

Route::group(['middleware'=>'auth'], function(){
    Route::post('/komentar/delete/{id}','UserController@hapuskomentar')->name('komentardelete');
    Route::get('/siswa/{id}/follow', 'TutorController@followUser')->name('follow');
    Route::get('/siswa/{id}/unfollow', 'TutorController@unFollowUser')->name('unfollow');
    Route::get('/laporan/{id}', 'UserController@show')->name('laporan');
    Route::post('/laporan/komentar', 'UserController@komentar')->name('komentar');
});
