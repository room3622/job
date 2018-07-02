<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;
use Illuminate\Support\Facades\Log;
use Cookie;
use Illuminate\Support\Facades\Hash;

use DB;


class Querylogs
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



        DB::enableQueryLog();


        $response = $next( $request );

        foreach ( DB::getQueryLog() as $log ) {

            $identity = $request->cookie('identity');


            $ident = 'identity='.$identity;

            $keys = [
                    $log[ 'query' ],
                    [ 'bindings' => $log[ 'bindings' ],
                    'time' => $log[ 'time' ] ]
            ];

            Log::useFiles(storage_path().'/logs/api.logs');

            Log::debug( $ident, $keys);
        }
        return $response;
    }
}
