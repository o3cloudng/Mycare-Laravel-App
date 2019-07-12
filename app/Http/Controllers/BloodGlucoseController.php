<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Exception;
use App\Http\Utility;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Subscriber;
use App\BloodGlucose;
//require('');

class BloodGlucoseController extends Controller
{
    private $bg;
    private $id;

    function __construct(Request $request){
        $this->bg = $request->input('bp');
        $this->id = $request->input('id');
    }

    /**
     * http request data
     */
    private function requestData(){
       return $data =[
           'BG'=>$this->bg
       ];
    }

    /**
     * Http request rules
     */
    private function requestRules(){
        return $rules = [
            'BG'=>'bail|required|numeric|max:999|min:0'
        ];
    }

    public function index() {
        $id = session('subscriber_id');
        $subscriber = User::findOrFail($id);
        $bgs = User::findOrFail($id)->bloodGlucose()->orderBy('created_at', 'DESC')->get();

        // dd($bgs);

        return view('subscriber.records.blood_glucose.index', [
            'bgs' => $bgs,
            'subscriber' => $subscriber
        ]);
    }

    /**
     * add bg reading
     */
    public function add(){
       
        $data = $this->requestData();
        $rules = $this->requestRules();
        $v = Utility::validateData($data,$rules);
        if($v->fails()){
            return back()->withErrors($v->messages()->all(),'add_bg');
        }else{
            $BG = new BloodGlucose;
            $BG->bg = $this->bg;
            $BG->subscriber_id = session('subscriber_id');
            if($BG->save()){
                    return back()->with('success','Blood Glucose added successfully');
            }else{
                return back()->with('error','Unable to add Blood Glucose, please try again'); 
            }
        }
      
    }

    /**
     * get edit page
     */
    public function edit($id){
        $user_id = session('subscriber_id');
        $subscriber = User::findOrFail($user_id);
     
        $bg = BloodGlucose::find($id);
        if(is_null($bg)){
            return back()->with('error','Blood Glucose record not found');
        }
        return view('edit_bg',[
            'bg'=>$bg,
            'subscriber' => $subscriber
        ]);
       
    }

    /**
     * update bg record
     */
    public function update(Request $request){
  
        $bg = BloodGlucose::findOrFail($request->id);
        $subscriber_id = session('subscriber_id');

        if ($subscriber_id === $bg->subscriber_id):
         
            $bg->bg = $request->blood_glucose;
            $bg->update();
            return redirect('blood_glucoses')->with('success','Blood Glucose record updated successfully');
        else: 
            return redirect('blood_glucoses')->with('error','Unable to update Blood Glucose, please try again');
        endif;
        
    }

    /**
     * delete bg record
     */
    public function delete($id){

        $bg = BloodGlucose::findOrFail($id);
        if ($bg) :
            $bg->delete();
            return back()->with('error','Blood Glucose record deleted');
        else :
            return back()->with('error','Blood Glucose record does not exist');
        endif;
    }
}
