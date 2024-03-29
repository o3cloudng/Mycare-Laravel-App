<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Utility;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Subscriber;
use App\BloodPressure;

class BloodPressureController extends Controller
{
    private $systolic;
    private $diastolic;
    private $pulse;
    private $imei;
    private $imsi;
    private $tel;
    private $iccid;
    private $id;

    function __construct(Request $request){
        $this->systolic = $request->input('systolic');
        $this->diastolic = $request->input('diastolic');
        $this->pulse = $request->input('pulse');
        $this->tel = $request->input('tel');
        $this->iccid = $request->input('iccid');
        $this->imsi = $request->input('imsi');
        $this->imei = $request->input('imei');
        $this->id = $request->input('id');
    }

    /**
     * request data
     */
    public function requestData(){
        return $data = [
            'systolic'=>$this->systolic,
            'diastolic'=>$this->diastolic,
            'pulse'=>$this->pulse,
            'telephone'=>$this->tel,
            'iccid'=>$this->iccid
        ];
    }

    /**
     * request rules
     */
    private function requestRules(){
        return $rules = [
            'systolic'=>'bail|required|numeric|min:0|max:999',
            'diastolic'=>'bail|required|numeric|min:0|max:999',
            'pulse'=>'bail|required|numeric|min:0|max:99',
            'telephone'=>'bail|required|numeric',
        ];
    }


    public function index() {
        $id = session('subscriber_id');
        $bps = User::findOrFail($id)->bloodPressure()->get();
        // return $bps;
        
        return view('subscriber.records.blood_pressure.index', [
            'bps' => $bps
        ]);
    }

    /**
     * add blood pressure readings
     */
    public function addBP(){
       
            $data = $this->requestData();
            $rules = $this->requestRules();
            $v = Utility::validateData($data,$rules);
            if($v->fails()){
                return back()->withErrors($v->messages()->all(),'add_bp')->withInput();
            }
            if (session('subscriber_id') == NULL ) 
            {
                return back()->withErrors($v->messages()->all(),'add_bp')->withInput();
                }
            if ($this->systolic < 120 && $this->diastolic > 80) {
                return back()->with('error','There is an error with your diastolic value');
            }
    
            if ($this->systolic >= 140 && $this->diastolic < 90) {
                return back()->with('error','There is an error with your diastolic value');
            }
        
    
            $subscriber_id = session('subscriber_id');
            $bp = new BloodPressure;
            $bp->systolic = $this->systolic;
            $bp->diastolic = $this->diastolic;
            $bp->pulse = $this->pulse;
            $bp->imei = $this->imei;
            $bp->imsi = $this->imsi;
            $bp->iccid = $this->iccid;
            $bp->tel = $this->tel;
            $bp->subscriber_id = $subscriber_id;
            if($bp->save()){
                return back()->with('success','Blood Pressure readings added successfully');
            }
            return back()->with('error','An error occured, please try again');
        
    }

    /**
     * edit bp
     */
    public function edit($id){
    
        $bp = BloodPressure::find($id);
        if(is_null($bp)){
            return back()->with('error','Blood Pressure reading does not exist');
        }
        return view('edit_bp',['bp'=>$bp]);
        
    }

    /**
     * update bp
     */
    public function update() {
        
        $data = $this->requestData();
        $rules = $this->requestRules();
        $bp = BloodPressure::find($this->id);
        if(is_null($bp)){
            return back()->with('update-bp','Blood Pressure does not exist');
        }
        $v = Utility::validateData($data,$rules);
        if($v->fails()){
            return back()->withErrors($v->messages()->all(),'update_bp')->withInput();
        }
        $subscriber_id = session('subscriber_id');
        $bp->systolic = $this->systolic;
        $bp->diastolic = $this->diastolic;
        $bp->pulse = $this->pulse;
        $bp->imei = $this->imei;
        $bp->imsi = $this->imsi;
        $bp->tel = $this->tel;
        $bp->iccid = $this->iccid;
        $bp->subscriber_id = $subscriber_id;

        if( $bp->update() ){

            return redirect('blood_pressures')->with('success','Blood Pressure updated successfully');
        
        }
        return back()->with('error','An error occured, please try again');
       
    }

    /**
     * delete bp
     */
    public function delete($id){
  
        $bp = BloodPressure::find($id);
        if(is_null($bp)){
            return back()->with('delete-bp','Blood Pressure does not exist');
        }else{
            $bp->delete();
            return back()->with('delete-bp','Blood Pressure deleted successfully');
        }


        Utility::errorLog($e);
        return back();
   
    }

}
