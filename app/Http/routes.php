<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

	Route::get('/', function () {
	    return view('welcome');
	});

    Route::get('games/create', '\App\Http\Controllers\GameController@create');
    Route::post('games', '\App\Http\Controllers\GameController@store');
    Route::get('games/{id}', '\App\Http\Controllers\GameController@show');
    Route::get('games/{id}/update', '\App\Http\Controllers\GameController@update');

    Route::get('test', function() {
    	return response()->json([
			['1', '2', '1'],
			['2', '2', '1'],
			['1', '2', '2']
    	]);
    });

});
