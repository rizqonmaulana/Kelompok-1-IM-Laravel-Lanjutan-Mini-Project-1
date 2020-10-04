<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'MahasiswaController@register');
Route::post('login', 'MahasiswaController@login');
Route::post('logout','MahasiswaController@logout');

/* Route Sebelum Di Prefix dan Group
Route::get('book', 'BookController@book');

Route::get('status', 'BookController@bookAuth')->middleware('jwt.verify');
Route::get('user', 'MahasiswaController@getAuthenticatedUser')->middleware('jwt.verify');

Route::post('krs','KrsController@store');
*/
Route::group(['middleware' => 'jwt.verify'], function(){

	//Role Id 1 untuk admin
	Route::group(['prefix'=>'admin','middleware'=> 'role-admin'] ,function(){
		Route::get('user', 'MahasiswaController@getAuthenticatedUser');
		Route::get('book', 'BookController@book');
		Route::get('status', 'BookController@bookAuth');
        Route::post('krs','KrsController@store');
        Route::post('matakuliah', 'matakuliahController@store');
        Route::put('dosen', 'matakuliahController@update');
	});

	// Role Id 2 Untuk Mahasiswa
	Route::group(['prefix'=>'mahasiswa','middleware'=> 'role-user'] ,function(){

			// Route::get('/krs','KrsController@get');
			Route::get('/profile/{id}','MahasiswaController@detail');
	});


});

