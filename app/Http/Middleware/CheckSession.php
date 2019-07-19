<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('subscriber_id')) {
            // return redirect('/phonesignin');

            $id = session('subscriber_id');

            $subscriber = User::findOrFail($id);
            // dd($subscriber);
            // $phone = (int)$subscriber->phone;
            $phone = $subscriber->phone;
            $service_id = 3705;

            $curl = curl_init();
            $url = 'http://spexweb.atp-sevas.com:8585/sevas/api/v1/subscription/search';

            $fields = array(
                        'msisdn' => $phone,
                        'service_id' => $service_id
                    );

            //url-ify the data for the POST
            $fields_string = http_build_query($fields);

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    "accept: application/json"
                ],
                CURLOPT_POSTFIELDS => $fields_string
            ));

            //execute post
            $result = curl_exec($curl);
            $result = json_decode($result, true);

            if(isset($result['actionResponseCode'])){
                // dd($result['actionResponseCode']);
                $request->session()->forget(['subscriber_id']);
                return redirect('activate')->with('error','Your subscription has expired.');  
                // dd($result['actionResponseCode']);
            }

            $currentDate = Carbon::now(); // 2019-07-18 10:27:29.262325 Africa/Lagos (+01:00)

            // Subscription request date Time
            $subDateTime = $result[0]['subscriptionReqTime']; // 2019-07-12 15:58:14.081212

            $subDateTime = explode(" ",$subDateTime);
            $date = $subDateTime[0];
            $date =  explode("-",$date);
            $year = $date[0];
            $month = $date[1];
            $day = $date[2];

            $time = $subDateTime[1];
            $time =  explode(":",$time);
            $hour = $time[0];
            $minute = $time[1];
            $sec = $time[2];

            $sec = explode(".", $sec);
            $second = $sec[0];
            $subscriptionPeriod = $result[0]['subscriptionPeriod'];

            //  Using Carbon
            $expiryDateTime = Carbon::create($year, $month, $day, $hour, $minute, $second, 'GMT');
            // Sub Expiry date & Time calculated
            $expiryDateTime = $expiryDateTime->addDays($subscriptionPeriod);
            //close connection
            curl_close($curl);

            // dd($result);
            if(!$expiryDateTime->lessThan($currentDate)) {
                // dd($expiryDateTime);
                return redirect('activate')->with('error','Your subscription has expired.');
                // return $next($request);
            } else {
                return $next($request);
            }
          // return redirect()->route('/');  
        } else {
            // return redirect('dashboard')->with('error','Your subscription has expired.');
            return $next($request);
        }
        // if (Auth::check())
        //     {
        //         // The user is logged in...
        //     } else {
        //          return redirect()->route('phonesignin');
        //     }
        return $next($request);
    }
}
