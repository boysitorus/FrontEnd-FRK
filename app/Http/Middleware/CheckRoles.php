<?php

namespace App\Http\Middleware;

use App\Utils\Tools;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        $auth = Tools::getAuth($request);

        if (!$auth)
        {
            return redirect()->route('logout.get');
        }

        if ($auth->user->role != "Dosen")
        {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
