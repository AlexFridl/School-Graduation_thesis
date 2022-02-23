<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlogerMiddleware
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
        if($request->session()->has('user')){
            $user =$request->session()->get('user');

            if($user->naziv == 'bloger'){
                return $next($request);
            }
        }
        return redirect()->route('logovanje')->with('poruka','Niste bloger!');
    }
}
