<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Bmi, BmiGoal};
use App\Http\Utility;

class BmiController extends Controller
{
    private $weight;
    private $height;
    private $id;

    function __construct(Request $request){
        $this->weight = $request->input('weight');
        $this->height = $request->input('height');
        $this->id = $request->input('id');
    }

    /**
     * http request data
     */
    private function requestData(){
        return $data = [
            'height'=>$this->height,
            'weight'=>$this->weight
        ];
    }

    /**
     * http request rules
     */
    private function requestRules(){
        return $rules = [
            'height'=>'bail|required|numeric',
            'weight'=>'bail|required|numeric'
        ];
    }

    /**
     * calculate bi
     */
    private function calculateBmi($weight,$height){
        $step1 = $weight * 0.45;
        $step2 = $height * 0.025;
        $step3 = $step2 * $step2;
        $step4 = $step1/$step3;
        return $step4;
    }

    /**
     * derive bmi status
     */
    private function bmiStatus($bmi){
        $res = '';
       if($bmi < 18.5){
        $res .= 'Under-weight';
       }
       if($bmi >= 18.5 && $bmi <= 24.90){
        $res .= 'Healthy';
       }
       if($bmi >= 25.0 && $bmi <= 29.9){
        $res .= 'Over-weight';
       }
       if($bmi >= 30){
           $res .= 'Obese';
       }
       return $res;
    }

    /**
     * derive bmi risk
     */
    private function bmiRisk($bmi){
        $res = '';
       if($bmi < 18.5){
        $res .= 'Low risk of diabetes';
       }
       if($bmi >= 18.5 && $bmi <= 24.9){
        $res .= 'Good health';
       }
       if($bmi >= 25.0 && $bmi <= 29.9){
        $res .= 'Risk of Diabetes';
       }
       if($bmi >= 30){
           $res .= 'High Risk of Diabetes';
       }
       return $res;
    }

    /**
     * create a BMI
     */
    public function create(Request $request){
            
            $id = session('subscriber_id');
            $weight_unit = $request->weight_unit;
            $height_unit = $request->height_unit;

            //TODO: When Weight is in Pound, Convert to Kilogram
            if ($weight_unit == 'lbs') {
                $this->validate($request, [
                    'weight' => 'required|numeric|min:0|max:300|',
                ]);
                $w = $request->weight;
                $weight = round($w/2.2046, 1);
            } else {
                $this->validate($request, [
                    'weight' => 'required|numeric|min:0|max:100|',
                ]);
                $weight = round($request->weight, 1);
            }

            //TODO: Convert Height From Inches to Centimetre
            // if ($height_unit == 'feet') {
            //     $this->validate($request, [
            //         'height' => 'required|numeric|max:120'
            //     ]);
            //     $h = $request->height;
            //     $height = round($h*30.48, 2);
            // } else {
            //     $this->validate($request, [
            //         'height' => 'required|numeric|max:370'
            //     ]);
            //     $height = round($request->height, 2);

            // }


            // Calculate Feet, Inches & Centimeter
            if ($height_unit == 'feet') {
                $this->validate($request, [
                    'height' => 'required|numeric|max:370'
                    // 'inches_val' => 'required|numeric|max:12'
                ]);
                $height = $request->height;
                // $height = $h + $request->inches_val;
            } else {
                $this->validate($request, [
                    'height' => 'required|numeric|max:370'
                ]);
                $height = round($request->height, 2);

            }

            $bmiCal = round(($weight/$height/$height) * 10000, 1);
            

            $bmi['subscriber_id'] =  $id;
            $bmi['height'] = $height;
            $bmi['weight'] = $weight;
            $bmi['bmi'] = $bmiCal;
            $bmi['status'] = $this->bmiStatus($bmiCal);
            $bmi['risk'] = $this->bmiRisk($bmiCal);

            $bmi = Bmi::create($bmi);

            return back()->with('success','Body Mass Index added successfully');
     
    }

    /**
     * load a form to update bmi
     */
    public function edit($id){

        $bmi = Bmi::findOrFail($id);
        return view('subscriber.records.body_mass_index.index',['bmi'=>$bmi]);
    
    }

    /**
     * updadte
     */
    public function update(){
        // dd($request);

        $bmi = Bmi::findOrFail($this->id);
        $data = $this->requestData();
        $rules = $this->requestRules();
        $v = Utility::validateData($data,$rules);
        if($v->fails()){
            return back()->withErrors($v->messages()->all(),'update-bmi');
        }
        $calc_bmi = $this->calculateBmi($this->weight,$this->height);
        $bmi->height = $this->height;
        $bmi->weight = $this->weight;
        $bmi->bmi = $calc_bmi;
        $bmi->status = $this->bmiStatus($calc_bmi);
        $bmi->risk = $this->bmiRisk($calc_bmi);
        $subscriber_id = session('subscriber_id');
        
        if ($bmi->subscriber_id  == $subscriber_id): 
            $bmi->update();
            return back()->with('success','Body Mass Index updated successfully');
        else:
            return back()->with('error','Errro updating Body Mass Index');
        endif;
    }

    /**
     * delete
     */
    public function delete($id){
        // $subscriber_id = session('subscriber_id');
        $bmi = Bmi::findOrFail($id);
        
        // if ($bmi->subscriber_id  == $subscriber_id):
        //     $bmi->delete();
        //     return back()->with('error','Body Mass Index deleted successfully');
        // else:
        //     return back()->with('error','An error was encountered');
        // endif;


        // $bp = BloodPressure::find($id);
        if(is_null($bmi)){
            return back()->with('error','Blood Pressure does not exist');
        }else{
            $bmi->delete();
            return back()->with('success','Blood Pressure deleted successfully');
        }


        Utility::errorLog($e);
        return back();
    }

    

    public function setGoal(Request $request) {
        
        $subscriber_id = session('subscriber_id');
        // $weight_unit = $request->weight_unit;
        // $height_unit = $request->height_unit;


            //TODO: When Weight is in Pound, Convert to Kilogram
            // if ($weight_unit == 'lbs') {
            //     $this->validate($request, [
            //         'weight' => 'required|numeric|min:0|max:300|',
            //     ]);
            //     $w = $request->weight;
            //     $weight = round($w/2.2046, 2);
            // } else {
            //     $this->validate($request, [
            //         'weight' => 'required|numeric|min:0|max:100|',
            //     ]);
            //     $weight = round($request->weight, 2);
            // }

            $this->validate($request, [
                'bmi'=>'required',
                'start_date'=>'required|date',
                'end_date' => 'required|date|after:start_date'
            ]);

            //TODO: Convert Height From Inches to Centimetre
            // if ($height_unit == 'feet') {
            //     $this->validate($request, [
            //         'height' => 'required|numeric|max:12'
            //     ]);
            //     $h = $request->height;
            //     $height = round($h*30.48, 2);
            // } else {
            //     $this->validate($request, [
            //         'height' => 'required|numeric|max:370'
            //     ]);
            //     $height = round($request->height, 2);

            // }
        $bmi = $request->bmi;
        // $bmiCal = round(($weight/$height/$height) * 10000, 2);
        // $hourTime = date('H', strtotime($request->hour));
// dd($hourTime);
        $status= 'activate';
        

        $bmi_goal = BmiGoal::updateOrCreate([
            'subscriber_id' => $subscriber_id,
                ],
                [
                    'bmi' => $bmi,
                    // 'height' => $height,
                    // 'weight' => $weight,
                    'status' => $status,
                    'frequency' => 1
                    // 'hour' => $hourTime,
                    // 'weekDay' => $request->weekDay,
                    // 'monthDay' => $request->monthDay
                ]);
        if ( $bmi_goal ):
            return back()->with('success','You have set a Body Mass Index Goal');
        else: 
            return back()->with('error','An error was encountered');
        endif;

    }

    public function activateOrDeactivate(Request $request) {
        $subscriber_id = session('subscriber_id');
        $bmiGoal = BmiGoal::where(['subscriber_id' => $subscriber_id, 'id' => $request->id])->first();
        if($bmiGoal->status == 'activate') {
            $bmiGoal->status = 'deactivate';
        }else {
            $bmiGoal->status = 'activate';
        }

        $bmiGoal->update();
        if($bmiGoal) {
            return response()->json(['success' => 'Your Body Mass Index Goal has been '.ucfirst($bmiGoal->status).'d' ]);
        }
    }
}
