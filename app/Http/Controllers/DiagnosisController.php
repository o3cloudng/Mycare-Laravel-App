<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\{Subscriber, Diagnosis, Medication, Http\Utility};
use \Exception;
use Illuminate\Support\Facades\Validator;

class DiagnosisController extends Controller
{
    private $diagnosis;
    private $id;

    function __construct(Request $request){
        $this->diagnosis = $request->input('diagnosis');
        $this->id = $request->input('id');
    }
       

    /**
     * hhpt request data
     */
    private function requestData($type){
        switch ($type) {
            case 'add':
                $data = [
                    'diagnosis'=>$this->diagnosis
                ];
                break;
                
            case 'update':
                $data = [
                    'Diagnosis'=>$this->id
                ];
                break;
            
            default:
                # code...
                break;
        }
        return $data;
    }

    /**
     * request rules
     */
    private function requestRules($type){
        switch ($type) {
            case 'add':
                $rules = [
                    "diagnosis"=>'bail|required|string'
                ];
                break;
            case 'update':
                $rules = [
                    'Diagnosis'=>'bail|required|numeric|exists:diagnosis,id'
                ];
                break;

            default:
                # code...
                break;
        }
        return $rules;
    }

    /**
     * add diagnosis
     */
    public function addDiagnosis(Request $request){
        // $this->validate($request, [
        //     'name' => 'required|string|max:255',
        // ]);
        dd($request);


        $validator = Validator::make($request->all(), [
           'name' => 'required|string|max:255'
           ]);
            
           if ($validator->fails()) {
                // Session::flash('error', $validator->messages()->first());
                return redirect()->back()->with('error', 'Name of Diagnosis is required.)');
           }

        $subscriber_id = session('subscriber_id');

        $diagnosis['name'] = $this->diagnosis;
        $diagnosis['subscriber_id'] = $subscriber_id;
        // $diagnosis['user_id'] = $subscriber_id;
        $diagnosis = Diagnosis::create($diagnosis);
        if($diagnosis) {
            return redirect('personal_profile')->with('success',$diagnosis->name . ' Diagnosis added succesfully');
        } else {
            return redirect('personal_profile')->with('error','Diagnosis not added');
        }
    }

    /**
     * get page to edit diagnosis
     */
    public function editDiagnosis($id){
       
        $diagnosis = Diagnosis::find($id);
        if(is_null($diagnosis)){
            return redirect('medical_profile')->with('update-diagnosis','Diagnosis you are trying to delete does not exist');
        }else{
            return view('edit_diagnosis',['diagnosis'=>$diagnosis]);
        }
    
    }

    /**
     * update diagnosis
     */
    public function updateDiagnosis(){
        $diagnosis = Diagnosis::find($this->id);
        if(is_null($diagnosis)){
            return redirect('medical_profile')->with('update-diagnosis','Diagnosis does not exist, try again');
        }
        $data = $this->requestData('add');
        $rules = $this->requestRules('add');
        $v = Utility::validateData($data,$rules);
        if($v->fails()){
            return back()->withErrors($v->messages()->all(),'update-diagnosis')->withInput();
        }else{
            $diagnosis->diagnosis = $this->diagnosis;
            if($diagnosis->update()){
                return redirect('medical_profile')->with('update-diagnosis','Dianosis updated successfully');
            }else{
                return redirect('medical_profile')->with('update-diagnosis','Unable to update diagnosis please try again');
            }
        }
    
    }

    /**
     * delete diagnosis
     */
    public function deleteDiagnosis($id){
        $diagnosis = Diagnosis::findOrFail($id);
        $subscriber_id = session('subscriber_id');

        if ($diagnosis->subscriber_id  == $subscriber_id):
            $diagnosis->delete();
            return back()->with('success','Dianosis deleted successfully');
        else:
            return back()->with('error','Unable to delete diagnosis please try again');
        endif;
    }
    

}
