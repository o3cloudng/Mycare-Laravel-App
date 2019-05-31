<?php

namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BmiGoal;
use App\BloodPressure;
use App\BloodPressureGoal;


class GoalController extends Controller
{
    public function index() {
        $subscriber_id = session('subscriber_id');
        $bmiGoal = BmiGoal::where('subscriber_id', $subscriber_id)->first();
        $bloodPressureGoal = BloodPressureGoal::where('subscriber_id', $subscriber_id)->first();
        
        return view('subscriber.goal.index', [
            'subscriber_id' => $subscriber_id,
            'bmiGoal' => $bmiGoal,
            'bloodPressureGoal' => $bloodPressureGoal
        ]);
    }

    public function setBPGoal(Request $request) {
        $subscriber_id = session('subscriber_id');

        if ($request->systolic < 120 && $request->diastolic > 80) {
            return back()->with('error','There is an error with your diastolic value');
        }

        if ($request->systolic >= 140 && $request->diastolic < 90) {
            return back()->with('error','There is an error with your diastolic value');
        }

        $bloodPressureGoal = BloodPressureGoal::updateOrCreate([
            'subscriber_id' => $subscriber_id,
                ], 
            [
            'status' => 'activate',
            'systolic' => $request->systolic,
            'diastolic' => $request->diastolic,
            'frequency' => $request->frequency,
            'hour' => $request->hour,
            'weekDay' => $request->weekDay,
            'monthDay' => $request->monthDay
        ]);
        if ( $bloodPressureGoal ):
            return back()->with('success','You have set a Blood Pressure Goal');
        else: 
            return back()->with('error','An error was encountered');
        endif;
    }
}
