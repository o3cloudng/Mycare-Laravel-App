<?php

namespace App\Http\Middleware;

use Closure;
use App\Subscriber;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = '')
    {
        //  $id = $request->session()->get('subscriber_id');

        //  $userRole = Subscriber::findOrFail($id);

        // //  dd($userRole->count());
        // if($userRole && $userRole->count() > 0) {
        //     $allowUser = 0;
        //     if ($userRole->user_role == "admin"){
        //         $allowUser = 10;
        //         $request->attributes->set('user_permission', $allowUser);
        //         return $next($request);
        //     } elseif ($userRole->user_role == "doctor"){
        //         $allowUser = 5;
        //         $request->attributes->set('user_permission', $allowUser);
        //         return $next($request);
        //         $request->attributes->set('user_permission', 5);
        //     } else {
        //         $allowUser = 1;
        //         $request->attributes->set('user_permission', 1);
        //         return $next($request);
        //     }
        // }

        // function grant_permission($allowUser) {
        //     if($allowUser == 10){
        //         dd($allowUser);// return redirect();
        //     } elseif($allowUser == 5){
        //         dd($allowUser);// return redirect();
        //     } else {
        //         dd("Subcriber");// return redirect();
        //     }
        // }
        // if($userRole && $userRole > 0)
        // {
        //     $userRole = $userRole->role;
        //     $checkRole = 0;
        //     if($userRole == $role && $role =='admin')
        //     {
        //         $checkRole = 1;
        //     }
        //     elseif($userRole == $role && $role == 'manager')
        //     {
        //         $checkRole = 1;
        //     }
        //     elseif($userRole == $role && $role == 'employee')
        //     {
        //         $checkRole = 1;
        //     }
            
        //     if($checkRole == 1)
        //         return $next($request);
        //     else
        //        return abort(401);
        // }
        // else
        // {
        //     return redirect('login');
        // }
        return $next($request);
    }
}
