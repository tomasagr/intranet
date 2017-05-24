<?php

namespace Intranet\Http\Middleware;

use Closure;

class IsAdminOrEditor
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
        if (\Auth::user()->rol->tag != 'ADMIN' && \Auth::user()->rol->tag != 'EDITOR') {
            return redirect('/home');
        }
        return $next($request);
    }
}
