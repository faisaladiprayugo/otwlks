<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class writtersession
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
        if(!$request->session()->exists('writter')){
            return redirect('/page-tidak-tersedia');
        }
        return $next($request);
    }
}
