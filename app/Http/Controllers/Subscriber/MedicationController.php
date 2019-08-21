<?php

namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;
use App\{Medication, User, Diagnosis,Http\Controllers\Controller};
use Session;


class MedicationController extends Controller
{
    public function index() {
        $subscriber_id = session('subscriber_id');

        $subscriber = User::findOrFail($subscriber_id);
        $medications = Medication::where('subscriber_id', $subscriber_id)->get();

        return view('subscriber.medication.index', [
            'medications' => $medications,
            'subscriber' => $subscriber
        ]);
    }

    public function addMedication() {
        $subscriber_id = session('subscriber_id');
        $subscriber  = User::findOrFail($subscriber_id);
        return view('subscriber.medication.new', [
            'subscriber' => $subscriber
        ]);

    }
    public function new($id) {
        $subscriber_id = session('subscriber_id');
        $diagnosis = Diagnosis::findOrFail($id);
        $medications = Medication::where('diagnosis_id', $id)->get();
        $users = User::where('subscriber_id', $subscriber_id)->role('doctor')->get();
        $subscriber  = User::findOrFail($subscriber_id);
       
        if ($subscriber_id === $diagnosis->subscriber_id ) {

            return view('subscriber.medical-profile.medication', [
                'diagnosis_id' => $id,
                'diagnosis' => $diagnosis,
                'medications' => $medications,
                'users' => $users,
                'subscriber' => $subscriber
            ]);
        } else {
            return redirect('dashboard');
        }
        
    }
    public function create(Request $request) {
        $start_date = $request->start_date;
        $duration = $request->duration;
        $end_date = date('Y-m-d', strtotime($start_date. ' + '.$duration.' days'));

        //TODO: Validation
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'frequency' => 'required',
            'end_date' => 'after:start_date',
            'start_date' => 'required'
        ]);
        //TODO: Create New Medication
        $subscriber_id = session('subscriber_id');
        $medication['name'] = $request->name;
        $medication['subscriber_id'] =  $subscriber_id;
        // $medication['diagnosis_id'] = $request->diagnosis_id; //TODO: Diagnosis should be added in the personal profile
        $medication['dosage'] = $request->dosage;
        $medication['diagnosis_id'] = 2;
        $medication['frequency'] = $request->frequency;
        $medication['medical_personal'] = $request->medical_personal;
        $medication['medical_personal_phone'] = $request->medical_personal_phone;
        $medication['start_date'] = $request->start_date;
        $medication['end_date'] = $end_date;
        $medication = Medication::create($medication);
        
        return redirect('/medications')->with('success', $medication->name. ' medication was added');
    }


    public function edit (Request $request) {
        //TODO: Convert Request to AJAX

         //TODO: Validation
         $this->validate($request, [
            'name' => 'string|max:255',
            'dosage' => 'string|max:255',
            'frequency' => 'required',
            'medical_personal_phone' => 'required|min:11',
            'start_date' => 'before:end_date',
            'end_date' => ''
        ]);

        $subscriber_id = session('subscriber_id');

        $medication = Medication::where('id', $request->id)->first();

        $medication->name = $request->name;
        $medication->subscriber_id = $subscriber_id;
        $medication->dosage = $request->dosage;
        $medication->frequency = $request->frequency;
        $medication->medical_personal = $request->medical_personal;
        $medication->medical_personal_phone = $request->medical_personal_phone;
        $medication->start_date = $request->start_date;
        $medication->end_date = $request->end_date;

        $m = $medication->update();
        if ($m) {
            return back()->with('success',$medication->name. ' Medication updated successfully');
        } else { 
            return back()->with('error','Error updating Medication');
        }

    }

    public function delete ($id) {
        // $medication = Medication::findOrFail($request->id);
        // $subscriber_id = session('subscriber_id');

        // if($medication->subscriber_id == $subscriber_id):
        //     $medication->delete();
        //     return response()->json(['success' => 'Medication has been deleted', 'name' => $medication->name]);
        // else:
        //     return response()->json('error','Unable to delete medication, please try again');
        // endif;

        $medication = Medication::findOrFail($id);
        // dd($medication);

        if(is_null($medication)){
            return back()->with('error','Unable to delete medication, please try again');
        }else{
            $medication->delete();
            return back()->with('success','Medication has been deleted '.$medication->name);
        }


        Utility::errorLog($e);
        return back();

    }
}
