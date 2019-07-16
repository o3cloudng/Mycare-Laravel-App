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

        $curl = curl_init();

        // Activation end point
        // $url = 'http://spexweb.atp-sevas.com:8585/sevas/api/v1/subscription/activate';
        // Search
        $url = 'http://spexweb.atp-sevas.com:8585/sevas/api/v1/subscription/search';

        $fields = array(
                    'msisdn' => $subscriber->phone,
                    'service_id' => 3705
                    // 'su_source' => urlencode("1234"),
                    // 'period' => urlencode("1234"),
                    // 'age' => urlencode("1234")
                    
                );

        //url-ify the data for the POST
        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = curl_exec($ch);
        // echo $result;

        //close connection
        curl_close($ch);


    	
    	return view('subscription', [
    		'subscriber' => $subscriber,
            'subscription' => $result
    	]);
    }
}
