<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminsession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->exists('admin')){
            return redirect('/page-tidak-tersedia');
        }
        return $next($request);
    }
}
