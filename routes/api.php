<?php

use Illuminate\Http\Request;
use App\User;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'AuthController@login');


//Route::group(['middleware' => 'jwt.auth'], function () {
	Route::post('logout', 'AuthController@logout');
	
	Route::post('profile', 'AuthController@profile');
//});
	//Route::middleware('CheckAdmin')->prefix('admin')->group(function () {

		Route::get('user_list', 'User_Controller@index');
		Route::get('user_info/{id}', 'User_Controller@show');
		Route::post('user_create', 'User_Controller@store');
		Route::post('user_update/{id}', 'User_Controller@update');
		Route::delete('user_delete/{id}', 'User_Controller@destroy');

	//});

