<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Settings;
use App\Http\Utility;

class SettingsController extends Controller
{
    private $enable_notification;

    function __construct(Request $request){
        $this->enable_notification = $request->input('enable_notification');
    }

    /**
     * enable user notification
     */
    public function enableNotification(){
        $data = [
            'notification'=>$this->enable_notification
        ];
        $rules = [
            'notification'=>'bail|required|numeric'
        ];
        $v = Utility::validateData($data,$rules);
        if($v->fails()){
            return back()->withErrors($v->messages()->all());
        }
        $setting = new Settings;
        $setting->enable_notification = 1;
        $setting->save();
        return back()->with('status','Notification enabled successfully');
    }

    /**
     * 
     */
    public function disableNotification(){
        $data = [
            'notification'=>$this->enable_notification
        ];
        $rules = [
            'notification'=>'bail|required|string'
        ];
        $v = Utility::validateData($data,$rules);
        if($v->fails()){
            return back()->withErrors($v->messages()->all());
        }
        $setting = new Settings;
        $setting->enable_notification = 0;
        $setting->save();
        return back()->with('status','Notification disabled successfully');
    }
}
