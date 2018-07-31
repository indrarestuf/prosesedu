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
   Route::middleware(['auth', 'murid'])->group(function(){
Route::get('/tryout/soal/buat', function () {
    return view('tryout.panitia.soal-buat');
});
Route::get('/tryout','SoalController@tryout')->name('tryout');
Route::get('/tryout/nilai','SoalController@nilai')->name('nilai');
Route::get('/tryout/soal','SoalController@index')->name('soallist');
Route::get('/tryout/soal/buat','SoalController@buat')->name('soalbuat');
Route::get('/json-pelajarans','SoalController@pelajarans');
Route::post('/tryout/soal/create','SoalController@create');
Route::delete('/tryout/soal/delete/{id}','SoalController@destroy')->name('soaldelete');

Route::get('/tryout/soal/smp/{mapel}','SoalController@soalsmp');
Route::get('/tryout/soal/sma/{mapel}','SoalController@soalsma');
Route::get('/tryout/soal/ptn/{mapel}','SoalController@soalptn');

Route::get('/tryout/soal/edit/{id}','SoalController@edit')->name('soalperbarui');
Route::post('/tryout/soal/update/{id}','SoalController@update')->name('soalupdate');

Route::get('/tryout/smp/{mapel}','SoalController@tosmp');
Route::get('/tryout/sma/{mapel}','SoalController@tosma');
Route::get('/tryout/ptn/{mapel}','SoalController@toptn');

Route::get('/tryout/smp/{mapel}/input','SoalController@inputtosmp')->name('inputtosmp');
Route::get('/tryout/smp/{mapel}/hasil','SoalController@hasiltosmp')->name('hasiltosmp');

Route::get('/tryout/sma/{mapel}/input','SoalController@inputtosma')->name('inputtosma');
Route::get('/tryout/sma/{mapel}/hasil','SoalController@hasiltosma')->name('hasiltosma');

Route::get('/tryout/ptn/{mapel}/input','SoalController@inputtoptn')->name('inputtoptn');
Route::get('/tryout/ptn/{mapel}/hasil','SoalController@hasiltoptn')->name('hasiltoptn');

Route::post('/jawab/{mapel}','SoalController@jawab')->name('jawab');

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
	Route::post('/admin/user/infotutor','UserController@infotutor')->name('infotutor');
	Route::post('/admin/user/infomurid','UserController@infomurid')->name('infomurid');
});
});

Route::name('tutor.')->group(function () {
       Route::middleware(['auth', 'tutor'])->group( function(){
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
   Route::middleware(['auth', 'murid'])->group( function(){
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
    Route::post('load/{username}/laporan','TutorController@loadlaporan' )->name('load-laporan');
});
