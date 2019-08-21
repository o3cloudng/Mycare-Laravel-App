<?php

namespace App\Http\Controllers\Subscriber;

use App\BloodGlucoseGoal;
use App\BloodPressure;
use App\BloodPressureGoal;
use App\BmiGoal;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class GoalController extends Controller
{
    public function index() {
        $subscriber_id = session('subscriber_id');
        $subscriber = User::findOrFail($subscriber_id);
        $bmiGoal = BmiGoal::where('subscriber_id', $subscriber_id)->first();
        $bloodPressureGoal = BloodPressureGoal::where('subscriber_id', $subscriber_id)->first();
        $bloodGlucoseGoal = BloodGlucoseGoal::where('subscriber_id', $subscriber_id)->first();
        // $bloodGlucoseGoal = BloodGlucoseGoal::where('subscriber_id', $subscriber_id)->first();

        // dd($bloodPressureGoal);
        
        return view('subscriber.goal.index', [
            'subscriber_id' => $subscriber_id,
            'bmiGoal' => $bmiGoal,
            'subscriber' => $subscriber,
            'bloodGlucoseGoal' => $bloodGlucoseGoal,
            'bloodPressureGoal' => $bloodPressureGoal
        ]);
    }

    public function setBPGoal(Request $request) {
        $subscriber_id = session('subscriber_id');
        // dd($request);

        if ($request->systolic < 120 && $request->diastolic > 80) {
            return back()->with('error','There is an error with your diastolic value');
        }

        if ($request->systolic >= 140 && $request->diastolic < 90) {
            return back()->with('error','There is an error with your diastolic value');
        }


        $bloodPressureGoal = BloodPressureGoal::updateOrCreate(
            ['subscriber_id' => $subscriber_id,
                ], 
            [
            'status' => 'activate',
            'systolic' => $request->systolic,
            'diastolic' => $request->diastolic,
            'frequency' => $request->frequency,
            // 'weekDay' => $request->weekDay,
            // 'monthDay' => $request->monthDay,
            'hour' => $request->hour
        ]);
        if ( $bloodPressureGoal ):
            return back()->with('success','You have set a Blood Pressure Goal');
        else: 
            return back()->with('error','An error was encountered');
        endif;
    }



    public function setBGGoal(Request $request) {
        $subscriber_id = session('subscriber_id');
        // dd($request);
        $this->validate($request, [
            'bg_goal' => 'required',
            'end_date' => 'after:start_date',
            'start_date' => 'required'
        ]);


        $bloodGlusoceGoal = BloodGlucoseGoal::updateOrCreate(
            ['subscriber_id' => $subscriber_id,
                ], 
            [
            'status' => 'activate',
            'bg_goal' => $request->bg_goal,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'frequency' => 'daily'
            // 'monthDay' => $request->monthDay,
            // 'hour' => $request->hour
        ]);
        if ( $bloodGlusoceGoal ):
            return back()->with('success','You have set a Blood Glucose Goal');
        else: 
            return back()->with('error','An error was encountered');
        endif;
    }
}
