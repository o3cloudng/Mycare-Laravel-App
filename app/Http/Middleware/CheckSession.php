<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckSession
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
        // dd(session('subscriber_id'));
        // if(session('subscriber_id') == '') {
        //     return redirect('/phonesignin');
        //   // return redirect()->route('/');  
        //     return $next($request);
        // } 
        // if (Auth::check())
        //     {
        //         // The user is logged in...
        //     } else {
        //          return redirect()->route('phonesignin');
        //     }
        return $next($request);
    }
}
