<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
// use Illuminate\Support\Facades\DB;
    // {Subscriber, Diagnosis, User, HealthCoach, Notify, BloodPressure, 
    // BloodGlucose, Bmi, Medication, BmiGoal, Http\Utility, Http\Controllers\Controller,  Notifications\ResetSubscriberPassword, CareTeam};

// use Spatie\Permission\Models\Role;
// use Carbon\Carbon;
// use \Exception;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request) {
    	// $credentials = $request->only('email', 'password');
    	$user = Subscriber::where('email', $request->email)->first();
    	// return $user;

        // dd($credentials);
        if(Subscriber::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
        	return "Success";
        }
        return "Failed";

        // if (Auth::attempt($credentials)) {
        //     // Authentication passed...
        //     // return redirect()->intended('dashboard');
        //     return "Done";
        // }
        // return "Failed";

    }
}
