<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Utility;
use Illuminate\Support\Facades\DB;
use App\Subscriber;
use App\EmergencyContact;

class EmergencyContactController extends Controller
{
    private $name;
    private $email;
    private $phone;
    private $zip_code;
    private $city;
    private $state;
    private $street;

    function __construct(Request $request){
        $this->name = $request->input('name');
        $this->email=$request->input('email');
        $this->phone = $request->input('phone');
        $this->zip_code = $request->input('zip_code');
        $this->state = $request->input('state');
        $this->city = $request->input('city');
        $this->street = $request->input('street');
    }


    /**
     * reqeust data
     */
    private function requestRules(){
        return $rules = [
            'name'=>'bail|required|string',
            'email'=>'bail|required|email',
            'phone'=>'bail|required|numeric',
            'city'=>'bail|required|string',
            'state'=>'bail|required|string',
            'street'=>'bail|required|string',
        ];
    }

    /**
     * request data
     */
    private function requestData(){
        return $data = [
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'city'=>$this->city,
            'state'=>$this->state,
            'street'=>$this->street,
            'state'=>'bail|required|string'
        ];
    }

    /**
     * update emergency contact
     */
    public function update(){
        try{
            $data = $this->requestData();
            $rules = $this->requestRules();
            $v = Utility::validateData($data,$rules);
            if($v->fails()){
                return back()->withErrors($v->messages()->all())->withInput();
            }
            $subscriber_id = session('subscriber_id');
            $contact = EmergencyContact::updateOrCreate(
                ['subscriber_id'=>$subscriber_id],
                ['name'=>$this->name,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'state'=>$this->state,
                'city'=>$this->city,
                'street'=>$this->street,
                'zip_code'=>$this->zip_code
                ]
            );
            if(!is_null($contact)){
                return back()->with('status','Emergency contact updated successfully');
            }
        }catch(Exception $e){
            Utility::errorLog($e);
            return back();
        }
    }
}
