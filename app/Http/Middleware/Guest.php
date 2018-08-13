<?php

namespace App\Http\Middleware;

use Closure;

class Guest
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
        $sCheck = session('area');
        if(!isset($sCheck) && $request->url() != url('/choose-country')){
            return redirect()
                ->to('/choose-country');
        }
        return $next($request);
    }
}
