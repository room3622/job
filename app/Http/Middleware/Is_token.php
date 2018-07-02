<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;
use App\User;
use Closure;
use Illuminate\Support\Facades\Log;
use Cookie;
use Illuminate\Support\Facades\Hash;

class Is_token
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

        $response = $next($request);

        $gen_token  = str_random(16);
        $identity = $request->cookie('identity');


        $token = $request->get('api_token');



        $login = User::where('api_token', $token)->first();


        if(!$login){

            if(!$identity){
                $log_token = $gen_token;
            }else{

                $log_token = $identity;
            }

            $data =array(
                'messages'=>'Access Token Denied',
                'time'=> date('Y-m-d H:i:s', time()),
                'identity'=>$log_token
            );

            Log::useFiles(storage_path().'/logs/api.logs');

            Log::error($data);


            if(!$identity){
                $response = response($data, 400)->header('Content-Type', 'application/json')->withCookie(cookie('identity', $gen_token,60));

            }else{


                $response = response($data, 200)->header('Content-Type', 'application/json');
            }



            return $response;
        }else{


            if(!$identity){

                $response =  $next($request)->withCookie(cookie('identity', $gen_token,60));

            }


            return $response;
        }






    }





}
