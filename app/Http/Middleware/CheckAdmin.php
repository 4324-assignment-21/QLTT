<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Http\Middleware\Session;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session()->has('key')) {
            $api_token = Session()->get('key');
            $client = new Client();
            $response = $client->post('http://localhost:8080/webservice/api/profile',[
                'query' => ['token' => $api_token]
            ]);
            $result = json_decode($response->getBody()->getContents());

            if($result->level == 1) {
                return $next($request);
            }
            else {
                return redirect()->route('user.home')->with(['flash_level'=>'danger','flash_message'=>'quyền hạn của bạn không đủ để truy cập']);
            }
        }
        return redirect()->route('getLoginUser');
    }
}
