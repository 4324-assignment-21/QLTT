<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuthException;
use JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request) {
    	$username = $request->username;
    	$password = $request->password;
    	$user = User::where('username', $username)->first();
    	
    	if($user) {
    		$api_token = $user->api_token;

    		if($api_token == NULL) {

    			if( ! $token = JWTAuth::attempt(['username' => $username, 'password' => $password]) ) {
    				return response()->json('Mật khẩu không chính xác',400);
    			}

    			$user = JWTAuth::toUser($token);

        		$user->api_token = $token;
        		$user->save();

        		return response()->json($token,200);
        	}
    		//token da tao
	    	try{

	            $user = JWTAuth::toUser($api_token);

	            return response()->json('Tài khoản này đã đăng nhập',400);

	        }catch(JWTException $e){

	            $user->api_token = NULL;
	            $user->save();

	            return response()->json("Đăng nhập thất bại",401);

	        }
    	}
    	else {
    		return response()->json('Tài khoản không tồn tại',400);
    	}
    }

    public function logout(Request $request)
    {
        $api_token = $request->token;

        try{

            $user = JWTAuth::toUser($api_token);

            $user->api_token = NULL;

            $user->save();

            JWTAuth::setToken($api_token)->invalidate();
            
            return response()->json(null,200);


        }catch(JWTException $e){

        	return response()->json("Đã phát sinh lỗi khi thực hiện hành động này!",401);

        }

    }

    public function profile (Request $request) {

    	try{

            $user = JWTAuth::toUser($request->token);

           return response()->json($user,200);


        }catch(JWTException $e){

        	return response()->json("Đã phát sinh lỗi khi thực hiện hành động này!",401);

        }
    }
}
