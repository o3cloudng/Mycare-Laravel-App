<?php

namespace App\Http\Controllers\Care;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\
    {Subscriber, Diagnosis, User, HealthCoach, Notify, BloodPressure, 
    BloodGlucose, Bmi, Medication, BmiGoal, Http\Utility, Http\Controllers\Controller,  Notifications\ResetSubscriberPassword, CareTeam};

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Carbon\Carbon;
use \Exception;
use Auth;

use Illuminate\Support\Facades\Hash;

use Session;

class CareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(Request $request){
        // $this->subscriberID = session('subscriber_id');        
    } 

    public function index(Request $request)
    {
        //
        // $role = Role::create(['name' => 'subscriber']);

        // $permission = Permission::create(['name' => 'Subscribers Portal']);
        $id = session('subscriber_id');
        $subscribers = Subscriber::findOrFail($id);

        return $subscribers;
        // return $id;
        // dd($subscribers);
        // $role = Role::findById($id);
        // $permission = Permission::findById($id);

        // $role->givePermissionTo($permission);
        // return $permission;
        // return "<pre>".Subscriber::findOrFail(1)."</pre>";

        // Subscriber::findOrFail($id)->givePermissionTo('SuperAdmin Portal');
        // Subscriber::findOrFail($id)->assignROle('superadmin');

        // return Subscriber::findOrFail($id)->roles;
        // return Subscriber::permission('superadmin')->get();
        // $sub = new Subscriber();
        // return $sub->role('superadmin')->get();
        // return Subscriber::with('role')->get();




        $subscribers = Subscriber::all();

        // $sub = Subscriber::where('id',*)->orderBy('id', 'desc')->get();
        // $name = "Olumide";
        // dd($subscribers);
        // $subscribers = [];
        return view('doctor.care-contact.index', [
            'subscribers' => $subscribers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
