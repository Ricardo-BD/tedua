<?php

namespace App\Http\Middleware;

use Closure;

class VentasMiddleware
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
        if (auth()->check() && auth()->user()->idrole == 3)
        return $next($request);

        return redirect('/entrada');
    }
}
