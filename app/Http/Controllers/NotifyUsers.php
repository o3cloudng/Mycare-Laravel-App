<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notify;
use App\Http\Utility;

class NotifyUserController extends Controller
{
    private $notification;
    
    function __construct(){
        //date_default_timezone_set(env('DEFAULT_TIME_ZONE'));
    }

    public static function getNotification(){
        $notifications = Notify::all();
        foreach($notifications as $not){
            if($not->time == date('h:i:s')){
                Utility::info('logged time');
            }
        }
    }
}
