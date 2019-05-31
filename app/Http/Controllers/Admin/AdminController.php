<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use \Exception;
// use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Traits\HasRoles;
use App\
    {Subscriber, Diagnosis, User, HealthCoach, Notify, BloodPressure, 
    BloodGlucose, Bmi, Medication, BmiGoal, Http\Utility, Http\Controllers\Controller,  Notifications\ResetSubscriberPassword, CareTeam};

class AdminController extends Controller
{
	use HasRoles;
	public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('auth']);
    }


    //
    public function admin(){
    	$users = User::with('roles')->get();
		return view('Admin.admin.admin', [
			'users' => $users
		]);
	}
	public function doctor(){
		$users = User::role('doctor')->get();
		return view('Admin.doctor.doctor', [
			'users' => $users
		]);		
	}
	public function physicalTrainer(){
		$users = User::role('physical-trainer')->get();
		return view('Admin.physical-trainer.physical_trainer', [
			'users' => $users
		]);
	}
	public function nutritionist(){
		$users = User::role('nutritionist')->get();
		return view('Admin.health-coach.nutritionist', [
			'users' => $users
		]);
		return view('Admin.nutritionist.nutritionist');		
	}
	public function healthCoach(){
		$users = User::role('health-coach')->get();
		return view('Admin.health-coach.healthCoach', [
			'users' => $users
		]);	
	}
	// public function medicalPersonel(){
	// 	$users = User::role('medical-personel')->get();
	// 	return view('Admin.physical-trainer.medicalPersonel', [
	// 		'users' => $users
	// 	]);	
	// }
	    public function getPersonalProfile(){
        $id = session('subscriber_id');
        
        // $diagnosis = Diagnosis::where('subscriber_id', $id)->get();
        $subscriber = User::find($id);
        $count = 0;
        if ( $subscriber->gender == NULL) {
            $count += 1 ;
        }

        if ( $subscriber->religion == NULL) {
            $count += 1;
        }
        if ( $subscriber->marital_status == NULL) {
            $count += 1;
        }
        if ( $subscriber->ethnic_group == NULL) {
            $count += 1;
        }
        if ( $subscriber->place_of_work == NULL) {
            $count += 1;
        }
        if ( $subscriber->address == NULL) {
            $count += 1;
        }
        if ( $subscriber->occupation == NULL) {
            $count += 1;
        }

        if ( $subscriber->date_of_birth == NULL) {
            $count += 1;
        }
       
        if ( $subscriber->religion == NULL) {
            $count += 1;
        }
        if ( $subscriber->avatar == NULL) {
            $count += 1;
        }
        // dd($count);
        $empty = 13 - $count;

        $value = round($empty/13 * 100);
        $max = 100;
        $min = 0;
        return view('personal_profile', [
            'subscriber' => $subscriber,
            'value' => $value,
            'max' => $max,
            'min' => $min
            // 'diagnosis' => $diagnosis
            ]);

    }


    public function UpdateProfile(Request $request){
        $this->validate($request, [
            'place_of_work' => 'string|nullable',
            'occupation' => 'string|nullable',
        ]);
      
        $id = session('subscriber_id');
        $subscriber = User::where('id', $id)->first();
        
        $user = User::find($id);
        $user->name = is_null($request->name) ? $subscriber->name : $request->name;
        $user->date_of_birth = is_null($request->date_of_birth) ? $subscriber->date_of_birth : $request->date_of_birth;
        $user->place_of_work = is_null($request->place_of_work) ? $subscriber->place_of_work : $request->place_of_work;
        $user->address = is_null($request->address) ? $subscriber->address : $request->address;
        $user->occupation = is_null($request->occupation) ? $subscriber->occupation : $request->occupation;
        $user->gender = is_null($request->gender) ? $subscriber->gender : $request->gender;
        $user->religion = is_null($request->religion) ? $subscriber->religion : $request->religion;
        $user->education = is_null($request->education) ? $subscriber->education : $request->education;
        $user->ethnic_group = is_null($request->ethnic_group) ? $subscriber->ethnic_group : $request->ethnic_group;
        $user->marital_status = is_null($request->marital_status) ? $subscriber->marital_status : $request->marital_status;

        $user->update();
        if ($user) :
            return back()->with('status','Profile updated successfully');
        else: 
            return back()->with('status','Error Updating Profile');
        endif;
        

    }

	public function error(){
		return view('404');
	}
}
