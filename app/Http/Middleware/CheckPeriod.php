<?php

namespace App\Http\Middleware;

use App\Utils\Tools;
use Closure;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\Response;

class CheckPeriod
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$typePage): Response
    {
        $auth = Tools::getAuth($request);

        if (in_array('FRK', $typePage))
        {
            $checkPeriodFRK = Tools::checkPeriodFRK($auth->user->token);

            if ($checkPeriodFRK == false) {
                return back();
            }
        } else if (in_array('FED', $typePage))
        {
            $checkPeriodFED = Tools::checkPeriodFED($auth->user->token);

            if ($checkPeriodFED == false) {
                return back();
            }
        }


        return $next($request);
    }
}
