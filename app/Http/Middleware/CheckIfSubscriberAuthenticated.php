<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckIfSubscriberAuthenticated
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
        if (!$request->session()->exists('subscriber_id')) {
            return redirect('/phonesignin');
        } else {
            $id = $request->session()->get('subscriber_id');
            $subscriber = User::findOrFail($id);

            // dd($subscriber);

            view()->share('subscriber', $subscriber);
        }
        
        return $next($request);
    }
}
