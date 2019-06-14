<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function index()
    {
    	$subscriber_id = session('subscriber_id');
    	if(!$subscriber_id) {
    		return redirect()->back()->withErrors('You do not have access to this page')->withInput();
    	}

    	$subscriber = User::findOrFail($subscriber_id);
    	return view('subscription', [
    		'subscriber' => $subscriber
    	]);
    }
}
