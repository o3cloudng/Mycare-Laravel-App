<?php

namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;
use App\{Doctor, Diagnosis, Http\Controllers\Controller};

use Session;

class DoctorController extends Controller
{
    public function index() {
        $subscriber_id = session('subscriber_id');

        $doctors = Doctor::where('subscriber_id', $subscriber_id)->get();

        return view('subscriber.medical-profile.doctor', [
            'doctors' => $doctors
        ]);
    }

    public function store(Request $request) {
        $subscriber_id = session('subscriber_id');

        $doctor['name'] = $request->name;
        $doctor['email'] = $request->email;
        $doctor['phone'] = $request->phone;
        $doctor['status'] = $request->status;
        $doctor['subscriber_id'] = $subscriber_id;

        $doctor = Doctor::create($doctor);

        return redirect('/doctor')->with('success', 'A New Doctor with the name  '.$doctor->name. ' has been created');

    }

    public function show($id) {
        $subscriber_id = session('subscriber_id');
        $doctor = Doctor::findOrFail($id);

        if ($doctor->subscriber_id == $subscriber_id) {

            $diagnosis = Diagnosis::where('doctor_id', $id)->get();

            return view('subscriber.medical-profile.doctor.show', [
                'doctor' => $doctor,
                'diagnosis' => $diagnosis
            ]);
        }
        return redirect('/doctor')->with('error', 'Sorry, you cannot view this doctor profile');

    }
}
