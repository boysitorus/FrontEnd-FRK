<?php

namespace App\Http\Middleware;

use App\Utils\Tools;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = Tools::getToken($request);
        if(! $token){
            return redirect()->route("logout.get");
        }

        $auth = Tools::getAuth($request);
        if(! $auth){
            return redirect()->route("logout.get");
        }


        $refresh_token = Tools::getTokenRefresh($request);
        if(! $refresh_token){
            return redirect()->route("logout.get");
        }

        $uid = Tools::getUserIdFromToken($token);

        if($uid <= 0 || !isset($auth->user->user_id) || ($auth->user->user_id != $uid)){
            return redirect()->route("logout.get");
        }

        return $next($request);
    }
}
