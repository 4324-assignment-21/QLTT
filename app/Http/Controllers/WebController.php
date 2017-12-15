<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Session;

class WebController extends Controller
{
    public function home () {
        return view('admin.master');
    }

    public function getLogin () {
        return view('admin.login');
    }

    public function postLogin (Request $request) {
    	$client = new Client();
        try{
            $response = $client->post('http://localhost:8080/webservice/api/login',[
                        'query' => [
                            'username' => $request->account,
                            'password' => $request->password
                        ]
                    ]);
            $result = json_decode($response->getBody()->getContents());
            Session()->put('key',$result);
            return redirect()->route('admin.home');
            
        }
        catch (RequestException $e){
           $response = json_decode($e->getResponse()->getBody(true)->getContents());
           return redirect()->back()->with('status', $response);
        }
    }

    public function logout () {
        $client = new Client();
    	$api_token = Session()->get('key');
        $request = $client->post('http://localhost:8080/webservice/api/logout',[
            'query' => ['token' => $api_token]
        ]);
        Session()->forget('key');
        return redirect()->route('user.home');
    }

    public function index () {
    	$client = new Client();
    	$request = $client->get('http://localhost:8080/webservice/api/user_list');
    	$data = json_decode($request->getBody()->getContents());
    	return view('admin.user.list',compact('data'));
    }

    public function getAdd () {
    	return view('admin.user.add');
    }

    public function store(StoreUser $request)
    {
        $client = new Client();
        try{

            $data = [
                'username' => $request->txtUser,
                'HoTen' => $request->HoTen,
                'email' => $request->txtEmail,
                'SoDienThoai' => $request->sdt,
                'NgaySinh' => $request->date,
                'password' => $request->txtPass,
                'level' => $request->rdoLevel
            ];

            $response = $client->post('http://localhost:8080/webservice/api/user_create',['query' => $data]);

            $result = json_decode($response->getBody()->getContents());
            return redirect()->route('admin.list')->with(['flash_level'=>'success','flash_message'=>$result]);
        }
        catch (RequestException $e){
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>$response]);
        }
        
    }

    public function show ($id) {
    	$client = new Client();
    	$request = $client->get('http://localhost:8080/webservice/api/user_info/'.$id);
    	$data = json_decode($request->getBody()->getContents());
    	return view('admin.user.edit',compact('data'));
    }

    public function update(UpdateUser $request, $id)
    {
    	$client = new Client();
        try{

            $data = [
                'HoTen' => $request->txtHoTen,
                'email' => $request->txtEmail,
                'SoDienThoai' => $request->sdt,
                'NgaySinh' => $request->date,
                'password' => $request->txtPass,
                'level' => $request->rdoLevel
            ];
                
            $response = $client->post('http://localhost:8080/webservice/api/user_update/'.$id, ['query' => $data]);

            $result = json_decode($response->getBody()->getContents());
            return redirect()->route('admin.list')->with(['flash_level'=>'success','flash_message'=>$result]);
        }

        catch (RequestException $e){

            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>$response]);
        }
       
    }

    public function destroy ($id) {
    	$client = new Client();
    	$request = $client->delete('http://localhost:8080/webservice/api/user_delete/'.$id);
        $result = json_decode($request->getBody()->getContents());
    	return redirect()->route('admin.list')->with(['flash_level'=>'success','flash_message'=>$result]);

    }
}
