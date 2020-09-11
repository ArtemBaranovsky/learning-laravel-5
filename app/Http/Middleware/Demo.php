<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Demo extends Request
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
        if (/*$request->is('articles/create') &&*/ $request->has('foo')) { // 1-st check has sense if middleware is set for all routes
            return redirect('articles');
        }
        return $next($request);
    }
}
