<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChecarIdade
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

        if ($request->input('idade ') !== '20') {
            return redirect('home');
        }

        return $next($request);
    }
}
