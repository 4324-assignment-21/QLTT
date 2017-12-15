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
Route::group(['middleware' => 'web'], function () {
	
	Route::get('admin_login',['as'=>'getlogin','uses'=>'WebController@getLogin']);
	Route::post('admin_login',['as'=>'postlogin','uses'=>'WebController@postLogin']);

	Route::get('logout',['as' =>'logout','uses'=>'WebController@logout']);

	//user
	Route::get('home',['as' =>'user.home','uses'=>'WebUserController@home']);
		//profile
	Route::get('profile/{id}',['as' => 'getProfile','uses' => 'WebUserController@getProfile']);
	Route::post('profile/{id}',['as' => 'postProfile','uses' => 'WebUserController@postProfile']);
	
		//login
	Route::get('login',['as'=>'getLoginUser','uses'=>'WebUserController@getLogin']);
	Route::post('login',['as'=>'postLoginUser','uses'=>'WebUserController@postLogin']);

	//admin
	Route::group(['prefix' => 'admin','middleware' => 'CheckAdmin'],function () {
		//home
		Route::get('home',['as' => 'admin.home','uses' => 'WebController@home']);

		//list
		Route::get('user_list',['as' => 'admin.list','uses' => 'WebController@index']);

		//upload info user
		Route::get('user_info/{id}',['as' => 'admin.getInfo','uses' => 'WebController@show']);
		Route::post('user_info/{id}',['as' => 'admin.postInfo','uses' => 'WebController@update']);

		//create user
		Route::get('user_add',['as' => 'admin.getAdd','uses' => 'WebController@getAdd']);
		Route::post('user_add',['as' => 'admin.postAdd','uses' => 'WebController@store']);
		
		//delete user
		Route::get('user_delete/{id}',['as' => 'admin.delete','uses' => 'WebController@destroy']);

	});
});