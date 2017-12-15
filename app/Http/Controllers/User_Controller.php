<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;

class User_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $username = $request->get('username');
        $hoten = $request->get('HoTen');
        $email = $request->get('email');
        $sdt = $request->get('SoDienThoai');
        $date = $request->get('NgaySinh');
        $pw = $request->get('password');
        $lv = $request->get('level');

        $check_username = User::where('username',$username)->first();
        $check_email = User::where('email',$email)->first();

        if($check_username){
            return response()->json('Tên đăng nhập đã tồn tại',400);
        }

        if($check_email){
            return response()->json('Email đã tồn tại',400);
        }

        $user->username = $username;
        $user->HoTen = $hoten;
        $user->email = $request->email;
        $user->SoDienThoai = $sdt;
        $user->NgaySinh = $date;
        $user->password = Hash::make($pw);
        $user->level = $lv;
        $user->save();
        
        return response()->json('created successfully',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $hoten = $request->get('HoTen');
        $email = $request->get('email');
        $sdt = $request->get('SoDienThoai');
        $date = $request->get('NgaySinh');
        $lv = $request->get('level');

        $check_email = User::where('email',$email)->where('id','<>',$id)->first();

        if($check_email){
            return response()->json('Email đã tồn tại',400);
        }

        if($request->get('password')) {
            $pw = $request->get('password');
            $user->HoTen = $hoten;
            $user->email = $request->email;
            $user->SoDienThoai = $sdt;
            $user->NgaySinh = $date;
            $user->password = Hash::make($pw);
            $user->level = $lv;
            $user->save();

            return response()->json('updated successfully',200);
        }
        else {
            $user->HoTen = $hoten;
            $user->email = $request->email;
            $user->SoDienThoai = $sdt;
            $user->NgaySinh = $date;
            $user->level = $lv;
            $user->save();

            return response()->json('updated successfully',200);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
       
        $user->delete();
        return response()->json('deleted successfully',200);
    }
       

}
