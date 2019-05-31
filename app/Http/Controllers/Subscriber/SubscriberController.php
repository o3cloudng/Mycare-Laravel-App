<?php

namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\
    {Subscriber, Diagnosis, User, HealthCoach, Notify, BloodPressure, 
    BloodGlucose, Bmi, Medication, BmiGoal, Http\Utility, Http\Controllers\Controller,  Notifications\ResetSubscriberPassword, CareTeam};

use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use \Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use Auth;

use Illuminate\Support\Facades\Hash;

use Session;

class SubscriberController extends Controller
{
    private $id;
    private $email;
    private $name;
    private $occupation;
    private $address;
    private $user_role;
    private $dob;
    private $weight;
    private $heigth;
    private $phone;
    private $password;
    private $confirm_password;
    private $place_of_work;
    private $new_pass;
    private $username;
    private $gender;
    private $code;

    /**
     * 
     */
    function __construct(Request $request){
        $this->name = $request->input('name');
        $this->email= $request->input('email');
        $this->occupation = $request->input('occupation');
        $this->address = $request->input('address');
        $this->user_role = $request->input('user_role');
        $this->dob = $request->input('dob');
        $this->phone = $request->input('phone');
        $this->password = $request->input('password');
        $this->confirm_password = $request->input('confirm_password');
        $this->new_password = $request->input('new_password');
        $this->place_of_work = $request->input('place_of_work');
        $this->username = $request->input('username');
        $this->gender = $request->input('gender');
        $this->code = $request->input('code');
        $this->utility = new Utility;
        $this->request = new Request;
    } 

    /**
     * get signin page
     */
    public function getSignin(){
        if (session('subscriber_id')) {
            return redirect('dashboard');
        }
        return view('signin');
       
    }

    /**
     * get signup page
     */
    public function getSignup(){
        if (session('subscriber_id')) {
            return redirect('dashboard');
        }
            return view('signup');
      
    }

    /**
     * get the dashboard
     */
    public function getDashboard(){
            // $id = session('subscriber_id');
            $id = Auth::user()->id;
            $subscriber = User::findOrFail($id);
           $bps = BloodPressure::where('subscriber_id',$id)->orderBy('id', 'desc')->take(7)->get();
            
            $bgs = BloodGlucose::where('subscriber_id',$id)->orderBy('id', 'desc')->take(7)->get();
            
            $bp_systole_today = BloodPressure::where('subscriber_id',$id)->pluck('systolic');
            $bp_diastole_today = BloodPressure::where('subscriber_id',$id)->pluck('diastolic');
            $currentBP = BloodPressure::where('subscriber_id', $id)->latest()->first();
            if (!is_null($currentBP)) {
                if ($currentBP->systolic < 120 && $currentBP->diastolic < 80) {
                    $currentBloodPressure = 'Normal';
                    $bps_color = "bg-success";
                } elseif(($currentBP->systolic >= 120 && $currentBP->systolic < 139) && ($currentBP->diastolic >= 80 && $currentBP->diastolic < 89)) {
                    $currentBloodPressure = 'At Risk (Prehypertension)';
                    $bps_color = "bg-warning";
                } elseif($currentBP->systolic >= 140 &&  $currentBP->diastolic >= 90) {
                    $currentBloodPressure = 'High';
                    $bps_color = "bg-danger";
                } else {
                    $currentBloodPressure = 'Unclear';
                    $bps_color = "bg-default";
                }
            } else {
                $currentBloodPressure = 'Undetermined';
                $bps_color = "bg-default";
            }
          

            $bg_today = BloodGlucose::where('subscriber_id',$id)->pluck('bg')->take(1);
            $bp_systole_weekly = BloodPressure::where('subscriber_id',$id)->pluck('systolic')->take(7);
            $bp_diastole_weekly = BloodPressure::where('subscriber_id',$id)->pluck('diastolic')->take(7);
            $bg_weekly = BloodGlucose::where('subscriber_id',$id)->pluck('bg')->take(7);
            
            $bp_systole_monthly = BloodPressure::where('subscriber_id',$id)->pluck('systolic')->take(30);
            $bp_diastole_monthly = BloodPressure::where('subscriber_id',$id)->pluck('diastolic')->take(30);
            $bg_monthly = BloodGlucose::where('subscriber_id',$id)->pluck('bg')->take(30);

            $bmi_goal = BmiGoal::where('subscriber_id', $id)->first();

            if (count($bp_systole_today) == 0 ) {
                $bp_systole_today[0] = 0;
            }
            if (count($bp_diastole_today) == 0) {
                $bp_diastole_today[0] = 0; 
            }

            if (count($bg_today) == 0) {
                $bg_today[0] = 0;
            }
            
            $bp_systole_weekly_avg = count($bp_systole_weekly) > 0 ? collect($bp_systole_weekly[0])->sum()/7 : 0;
            $bp_diastole_weekly_avg = count($bp_diastole_weekly) > 0 ? collect($bp_diastole_weekly[0])->sum()/7 : 0;
            $bg_weekly_avg = count($bg_weekly) > 0 ? collect($bg_weekly[0])->sum()/7 : 0;

            $bp_systole_monthly_avg = count($bp_systole_monthly) > 0 ? collect($bp_systole_monthly[0])->sum()/30 : 0;
            $bp_diastole_monthly_avg = count($bp_diastole_monthly) > 0 ? collect($bp_diastole_monthly[0])->sum()/30 : 0;
            $bg_monthly_avg = count($bg_monthly) > 0 ? collect($bg_monthly[0])->sum()/30 : 0;

           
            $bmi = Bmi::where('subscriber_id',$id)->orderBy('created_at', 'desc')->first();

       
            
            //TODO: Dashboard Main View is a Line Graph showing the Last 30 Day's Blood Pressure Reading (Diastolic and Systolic)

            //TODO: MyBG - Blood Glucose Graph (Used to show blood glucose)

           
           
            return view('dashboard',[
                'bp_systole_today'=> $bp_systole_today[0],
                'bp_diastole_today'=> $bp_diastole_today[0],
                'bg_today'=>$bg_today[0],

                'bp_systole_weekly_avg'=>$bp_systole_weekly_avg,
                'bp_diastole_weekly_avg'=>$bp_diastole_weekly_avg,

                'bg_weekly_avg'=>$bg_weekly_avg,

                'bp_systole_monthly_avg'=>$bp_systole_monthly_avg,
                'bp_diastole_monthly_avg'=>$bp_diastole_monthly_avg,

                'bg_monthly_avg'=>$bg_monthly_avg,
                'bmi'=>$bmi,
                'bps' => $bps,
                'bgs' => $bgs,
                'bmi_goal' => $bmi_goal,
                'currentBloodPressure' => $currentBloodPressure,
                'currentBP' => $currentBP,
                'subscriber' => $subscriber

                ]);
    }

    /**
     * get personal profie page
     */
    public function getPersonalProfile(){
        $id = session('subscriber_id');
        
        $diagnosis = Diagnosis::where('subscriber_id', $id)->get();
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
            'min' => $min,
            'diagnosis' => $diagnosis
            ]);

    }

    /**
     * get subscriptions page
     */
    public function getSubscriptions(){
        return view('subscriptions');
    }

    /**
     * get subscriptions page
     */
    public function getSettings(){
        return view('settings');
    }

    /**
     * get records page
     */
    public function getRecords(){
       
            $id = session('subscriber_id');
            $bps = Subscriber::findOrFail($id)->bloodPressure()->paginate(10);
            $bgs = Subscriber::findOrFail($id)->bloodGlucose()->paginate(10);
            return view('records',['bps'=>$bps,'bgs'=>$bgs]);
   
    }

    /** Medical Personals Page */
    public function getMedicalPersonals() {
        $users = User::all();

        return view('subscriber.medical_personal.index', [
            'users' => $users
        ]);

    }

    /**
     * Get Care Team page
     */
    public function getCareTeam(){
        $subscriber_id = session('subscriber_id');
        $careTeams = CareTeam::where(['subscriber_id' => $subscriber_id, 'status' => 'approved'])->get();
     
        $roles = Role::all();
       
        return view('subscriber.care-team.index',[
                'careTeams' => $careTeams,
                'roles' => $roles
            ]);
    }

    /**
     * get notification page
     */
    public function getNotification(){
        
            $id = session('subscriber_id');
            $notification = Notify::where('subscriber_id',$id);
            if($notification->count()<1){
                //array of default notifications
                $array = array(
                   0=>[
                        'notification'=>'Remind me if I have check my blood pressure today at',
                        'time'=>null,
                        'status'=>0,
                        'deletable'=>0,
                        'updatable'=>0
                   ],
                   1=>[
                    'notification'=>'Remind me if I remembered to take my medication at ',
                    'time'=>null,
                    'status'=>0,
                    'deletable'=>0,
                    'updatable'=>0
                   ],
                   2=>[
                    'notification'=>'Remind me to refill my prescription when I have  ',
                    'time'=>null,
                    'status'=>0,
                    'deletable'=>0,
                    'updatable'=>0
                   ],
                    );
                    $i=0;
                    foreach($array as $not){
                        $notification = new Notify;
                        $notification->notification = $not['notification'];
                        $notification->time = $not['time'];
                        $notification->status = $not['status'];
                        $notification->subscriber_id = $id;
                        $notification->deletable = $not['deletable'];
                        $notification->save();
                    }
                   
            }
            $notification = Notify::where('subscriber_id',$id)->paginate(10);
            return view('notifications',['notifications'=>$notification]);
     
    }

    /**
     * kilo 
     */
    public function getBmi(){
        $id = session('subscriber_id');
        $body_mass_indexes = Bmi::where('subscriber_id', $id)->get();
        
        return view('subscriber.records.body_mass_index.index', [
            'body_mass_indexes' => $body_mass_indexes
            ]);
       
    }

    /**
     * request data
     */
    private function requestData($type=null){
       
            switch ($type) {
                //--------------------reqy=uest data for signup-----------------------
                case 'signup':
                $data = [
                    'Name'=>$this->name,
                    'Email'=>$this->email,
                    'Phone'=>$this->phone,
                    'Address'=>$this->address,
                    'user_role'=>$this->user_role,
                    'Date of birth'=>$this->dob,
                    'Occupation'=>$this->occupation,
                    'Password'=>$this->password,
                    'Confirm password'=>$this->confirm_password,
                    'place of work'=>$this->place_of_work
                ];
                    break;
                
                    //-------------------request data for user update----------------------------
                case 'update':
                    $data = [
                    'Name'=>$this->name,
                    'Email'=>$this->email,
                    'Phone'=>$this->phone,
                    'Address'=>$this->address,
                    'user_role'=>$this->user_role,
                    'Date of birth'=>$this->dob,
                    'Occupation'=>$this->occupation,
                    'place of work'=>$this->place_of_work,
                    'Gender'=>$this->gender
                    ];
                    break;   
                    
                    //--------reques data for change password-----------------
                case 'change_password':
                    $data = [
                        'Old Password' =>$this->password,
                        'New Password'=>$this->new_password,
                        'Confirm Password'=>$this->confirm_password
                    ];
                    break;

                    //----------------request data for forgot password---------//
                case 'forgot_password':
                    $data = [
                        'Email'=>$this->email,
                    ];

                    //---------------------------rquest data for signin--------------//
                case 'signin':
                $data = [
                    'Password'=>$this->password,
                    'Username'=>$this->email
                ];
                break;

                default:
                $data = [
                    'Name'=>$this->name,
                    'Email'=>$this->email,
                    'Phone'=>$this->phone,
                    'Address'=>$this->address,
                    'user_role'=>$this->user_role,
                    'Date of birth'=>$this->dob,
                    'Occupation'=>$this->occupation,
                    'Password'=>$this->password,
                    'Confirm password'=>$this->confirm_password,
                    'place of work'=>$this->place_of_work,
                    'Gender'=>$this->gender
                ];
                    break;
            }
            return $data;
       
    }

    private function rules($type){
        switch ($type) {
            //----------------------rules for signup------------------------
            case 'signup':
                $rules = [
                    'Email'=>'bail|required|email|unique:subscribers',
                    'Name'=>'bail|required|string',
                    'Phone'=>'bail|required|numeric|unique:subscribers',
                    'Password'=>'bail|required|string|min:6',
                    'Confirm password'=>'bail|required|string|same:Password'
                ];
                break;

                //---------------------rules for update user-------------------------
            case 'update':
                $rules = [
                    'Email'=>'bail|required|email',
                    'Name'=>'bail|required|string',
                    'Phone'=>'bail|required|numeric',
                    'Date of birth'=>'bail|required|string',
                    'Address'=>'bail|required|string',  
                    'Gender' => 'bail|required|string'
                ];
                break;

                //-------------------rules for confirm password------------------------
            case 'change_password':
                $rules = [
                    'Old Password'=>'bail|required|string',
                    'New Password'=>'bail|required|string',
                    'Confirm Password'=>'bail|required|string|same:New Password'
                ];
                break;

                //---------------------------rule for forgot password-----------//
            case 'forgot_password':
                $rules = [
                    'Email'=>'bail|required|email|exists:subscribers,email'
                ];
                break;

                //-------------rules for signin-----------------
            case 'signin':
            $rules = [
                'Password'=>'bail|required|string',
                'Username'=>'bail|required|string'
            ]; 
            
            default:
                # code...
                break;
        }
        return $rules;
    }

    /**
     * process signup
     */
    public function processSignup(){
        $data = $this->requestData('signup');
        $rules = $this->rules('signup');
        $v = Utility::validateData($data,$rules);
        if($v->fails()){
            return redirect('signup')->withErrors($v->messages()->all())->withInput();
        }else{
            DB::transaction(function(){
                $user = new User;
                $user->name = $this->name;
                $user->email = $this->email;
                $user->phone = $this->phone;
                $user->address = $this->address;
                $user->date_of_birth = $this->dob;
                $user->occupation = $this->occupation;
                $user->place_of_work = $this->place_of_work;
                $user->password = Utility::hashPassword($this->password);
                $user->token = base64_encode($this->email);
                $user->save();

                $user->assignRole($this->user_role);
            });
            return redirect('signin')->with('status','Account created successfully');
        }
    }

    /**
     * process signin
     */
    public function validation($request) {
        return $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }
    public function processSignin(Request $request){
        // dd(Auth::user());
        $this->validation($request);
        $user = User::where('email', $request->email)->first();
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $user = User::where('email', $request->email)->first();
            // session(['subscriber_id'=>$user->id]);

            if ($user->hasRole('administrator'))
            {
                session(['subscriber_id'=>$user->id]);
                return redirect('administrator');
            } 
            elseif ($user->hasRole('doctor'))
            {
                session(['subscriber_id'=>$user->id]);
                return redirect('dashboard');
            } 
            elseif ($user->hasRole('nutritionist'))
            {
                session(['subscriber_id'=>$user->id]);
                return redirect('dashboard');
            } 
            elseif ($user->hasRole('physical-trainer'))
            {
                session(['subscriber_id'=>$user->id]);
                return redirect('physical-trainer');
            }
            elseif ($user->hasRole('health-coach'))
            {
                session(['subscriber_id'=>$user->id]);
                return redirect('health-coach');
            }
            elseif ($user->hasRole('subscriber'))
            {
                session(['subscriber_id'=>$user->id]);
                return redirect('dashboard');
            }

            // return "No role";
            return abort('errors.404');
        }
        // return redirect()->back();
        if(!$user){
            return redirect()->back()->withErrors('User does not exist')->withInput();
        }
        return redirect()->back()->withErrors('Invalid username or password')->withInput();       
    }

    /**
     * get signin page
     */
    public function phoneSignin(){
        if (session('subscriber_id')) {
            return redirect('dashboard');
        }
        return view('phone_login');
       
    }
    public function processPhoneSignin(Request $request){
        // dd(Auth::user());
         $this->validate($request,[
            'phone' => 'required',
        ]);
        $user = User::where('phone', $request->phone)->first();

        // dd($user);
        if(Auth::check([
            'phone' => $request->phone
        ]))
        {
            // $user = User::where('phone', $request->phone)->first();
            session(['subscriber_id'=>$user->id]);
            return redirect('dashboard');
        } else {
            return redirect()->back()->withErrors('User does not exist')->withInput();
        }
        // return redirect()->back()->withErrors('Invalid username or password')->withInput();       
    }

    /**
     * update a subscriber
     */
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

    public function verifyEmailPage(){
        return view('verify_email');
        
    }
    /**
     * change subscriber password
     */
    public function changePassword(){
       
        $data =   $this->requestData('change_password');
        $rules = $this->rules('change_password');
        $v = Utility::validateData($data, $rules);
        if($v->fails()){
            return back()->withErrors($v->messages()->all(),'change_password')->withInput();
        }else{
            $id = session('subscriber_id');
            $get_password = Subscriber::where('id',$id)->value('password');
            $check = Utility::checkPassword($this->password,$get_password);
            if(!$check){
                return back()->withErrors('Old password does not match','change_password')->withInput();
            }else{
                $password = Hash::make($this->new_password);
                $user = Subscriber::find($id);
                $user->password = $password;
                $user->update();
                return back()->with('change-password','Password changed successfully');
            }
        }
       
    }

    /**
     * verify email for forgot Password
     */
    public function verifyEmail(){
        $data = ['email'=>$this->email];
        $rule = ['email'=>'bail|required|email|exists:subscribers,email'];
        $v = Utility::validateData($data,$rule);
        if($v->fails()){
            return back()->withErrors($v->messages()->all());
        }else{
            $subscriber = User::where('email', $this->email)->first();
            if ($subscriber):
                $subscriber->token = str_random(40).time();
                $subscriber->update();
                $subscriber->notify(new ResetSubscriberPassword($subscriber->token));
                return redirect('signin')->with('success', 'Password Reset Token sent to your email, Check your email');
            else:
                return redirect('signin')->with('error', 'Problem generating token for this email');
            endif;
        }
    }

  
   
    public function loadResetPassword($token) {
        $subscriber = User::where('token', $token)->first();
        if ($subscriber) :
            return view('forgot_password', [
                'token' => $token
            ]);
        else:
            return redirect('signin')->with('error', 'The Token has expired/ or incorrect');
        endif;
    }

    public function resetPassword(Request $request, $token) {
        $this->validate($request, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        $subscriber = User::where([
                                'token' => $token,
                                'email' => $request->email
                                ])->first();
        $subscriber->token = NULL;
        $subscriber->password = Hash::make($request->password);
        $subscriber->update();

        if ($subscriber) :
            return redirect('signin')->with('status','Password updated successfully, please login');
        else: 
            return redirect('signin')->with('error','Error Updating Password');
        endif;
    }

    /**
     * get all subscribers
     */
    public function getSubscribers(){
        try{
            $subscribers = User::all();
            return view('');
        }catch(Exception $e){

        }
    }


    public function signout(Request $request) {

        $request->session()->forget(['subscriber_id']);
       
        return redirect('phonesignin')->with('success', 'You have been log out');
    }

    public function uploadAvatar (Request $request) {
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = session('subscriber_id');
        
        $subscriber = User::find($id);
        
        if($request->hasfile('avatar')) :
            $file = $request->file('avatar');
            $file->store('public');
            $name = $file->hashName();
            $subscriber->avatar = $name;

            $subscriber->update();

            return redirect('/personal_profile')->with('success', 'The avatar has been added successfully');
        else:
            return redirect('/personal_profile')->with('error', 'No image added');
        endif;
       
    }

 
}

