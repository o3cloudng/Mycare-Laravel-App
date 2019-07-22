<?php

namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;
use App\{Diagnosis, User, Http\Controllers\Controller};
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Session;
use Illuminate\Support\Facades\Validator;

use App\Notifications\UserRegisteredSuccessfully;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriber_id = session('subscriber_id');

        $users = User::all();
       
        $diagnosis = Diagnosis::where('subscriber_id', $subscriber_id)->get();
        $roles = Role::all();

        return view('subscriber.medical-profile.index', [
            'diagnosis' => $diagnosis,
            'roles' => $roles,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $subscriber_id = session('subscriber_id');
        
        
        if (isset($request->name) && isset($request->email) && isset($request->phone)) {
            
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'numeric',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subscriber_id' => $subscriber_id,
                'token' => str_random(40) . time(),
                'password' => bcrypt('secret'),
            ]);

            $user->assignRole( $request->role );
            if ( $user ) {
                $user->notify(new UserRegisteredSuccessfully($user));
            } 
        }
        
        $diagnosis['subscriber_id'] = $subscriber_id;
        $diagnosis['diagnosis'] = $request->diagnosis;
        $diagnosis['user_id'] = isset($user) ? $user->id : $request->user_id;

        if (!isset ($diagnosis['user_id'])) {
            return redirect('/diagnosis')->with('error', 'Error when adding diagnosis, Complete form and start again');
        }
        $diagnosis = Diagnosis::create($diagnosis);
        if ($diagnosis):
            return redirect('/diagnosis/'.$diagnosis->id.'/medication')->with('success', $diagnosis->diagnosis. ' was added, Please add the necessary medications');
        else:
            return redirect('/diagnosis')->with('error', 'Error when adding diagnosis, Complete form and start again');
        endif;
    }


    /** New Implementation */
    public function addDiagnosis (Request $request) {
        // $this->validate($request, [
        //     'name' => 'required|string|max:255',
        // ]);
        // dd($request);


        $validator = Validator::make($request->all(), [
           'name' => 'required|string|max:255'
           ]);
            
           if ($validator->fails()) {
                // Session::flash('error', $validator->messages()->first());
                return redirect()->back()->with('error', 'Name of Diagnosis is required.');
           }

        $subscriber_id = session('subscriber_id');

        $diagnosis['name'] = $request->name;
        $diagnosis['subscriber_id'] = $subscriber_id;
        $diagnosis = Diagnosis::create($diagnosis);
        if($diagnosis) {
            return redirect('personal_profile')->with('success',$diagnosis->name . ' Diagnosis added succesfully');
        } else {
            return redirect('personal_profile')->with('error','Diagnosis not added');
        }
    }
    
}
