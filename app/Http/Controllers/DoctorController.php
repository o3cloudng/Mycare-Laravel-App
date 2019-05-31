<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Http\Utility;
use Illuminate\Support\Facades\DB;
use App\Subscriber;

class DoctorController extends Controller
{
    private $email;
    private $name;
    private $phone;

    function __construct(REquest $request){
        $this->email = $request->input('email');
        $this->name = $request->input('name');
        $this->phone = $request->input('phone');
    }

    /**
     * http request data
     */
    private function requestData(){
        return $data = [
            'email'=>$this->email,
            'name'=>$this->name,
            'phone'=>$this->phone
        ];
    }

    /**
     * http request rules
     */
    private function requestRules(){
        return $rules = [
            'email'=>'bail|required|email',
            'name'=>'bail|required|string',
            'phone'=>'bail|required|numeric'
        ];
    }

    /**
     * add a doctor
     */
    public function addDoctor(){
        try{
            $data = $this->requestData();
            $rules = $this->requestRules();
            $v = Utility::validateData($data,$rules);
            if($v->fails()){
                return back()->withErrors($v->messages()->all(),'update_doctor')->withInput();
            }
            $subscriber_id = session('subscriber_id');
            //$id = Doctor::where('subscriber_id', $subscriber_id)->value('id');
            $doctor = Doctor::updateOrCreate(
                ['subscriber_id'=>$subscriber_id],
                ['name'=>$this->name,'email'=>$this->email,'phone'=>$this->phone]
            );
            if(!is_null( $doctor)){
                return back()->with('update-doctor','Doctor updated Successfully');
            }else{
                return back()->with('update-doctor','Unable to update doctor, please try again');
            }
        }catch(Exception $e){
            Utility::errorLog($e);
            return back();
        }
    }
}
