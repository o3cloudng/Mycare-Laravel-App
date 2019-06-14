<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Spatie\Permission\Traits\HasRoles;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use HasRole;

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('login');
    }
   

     // check if authenticated, then redirect to dashboard
    protected function authenticated($request, $user) {
       
        // Check if User meets a condition

        if ($user->active == 0) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Please activate your account');
        } elseif ($user->change_password == 0) {
            Auth::logout();
            return redirect()->route('password.request')->with('error', 'Please reset your password');
        } else {
            return redirect()->route('user')->with('success', 'Welcome to MyCarePlus '. Auth::user()->name);
        }

        // Using Spatie Role based authentication
        // if ($user->hasRole('administrator')) {
        //     return redirect()->route('admin');
        // } elseif ( $user->hasRole('doctor') ){
        //     return redirect()->route('physical-trainer');
        // } elseif ( $user->hasRole('physical_trainer')  ) {
        //     return redirect()->route('nutritionist');
        // } elseif ( $user->hasRole('health-coach')  ) {
        //     return redirect()->route('health_coach');
        // } elseif ( $user->hasRole('subscriber')  ) {
        //     return redirect()->route('subscriber');
        // } else {
        //     return redirect()->route('home')->with('error', 'Please reset your password');
        // }
    }



    // public function login(Request $request) {
    //     // dd($request);
    //     $credentials = $request->only('email', 'password');

    //     // dd($credentials);

    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed...
    //         // return redirect()->intended('dashboard');
    //         return "Done";
    //     }
    //     return "Failed";

    // }
}
