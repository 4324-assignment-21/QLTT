<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUser;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class WebUserController extends Controller
{
    public function home() {
        return view('user.index');
    }

    public function getLogin () {
        return view('user.login');
    }

    public function postLogin(Request $request) {
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
            return redirect()->route('user.home');
            
        }
        catch (RequestException $e){
           $response = json_decode($e->getResponse()->getBody(true)->getContents());
           return redirect()->back()->with('status', $response);
        }
    }

    public function getProfile ($id) {
    	$client = new Client();
    	$request = $client->get('http://localhost:8080/webservice/api/user_info/'.$id);
    	$data = json_decode($request->getBody()->getContents());
    	return view('user.profile',compact('data'));
    }

    public function postProfile (UpdateUser $request, $id) {
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
            return redirect()->route('user.home')->with(['flash_level'=>'success','flash_message'=>$result]);
        }

        catch (RequestException $e){

            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>$response]);
        }
    }
}
