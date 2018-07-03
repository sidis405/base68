<?php

namespace App\Http\Middleware;

use Closure;

class Manutenzione
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return redirect('/');
        abort(503);
        return $next($request);
    }
}
