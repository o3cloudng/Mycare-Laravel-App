<?php

namespace App\Http\Controllers\Subscriber;

use App\User;
use App\{Subscriber, Cholesterol, Http\Controllers\Controller, Notifications\CholesterolAlert};
use Illuminate\Http\Request;

class CholesterolController extends Controller
{
    /*
    * Calculatues cholesterol Status
    */
    private function cholesterolStatus($cholesterol){
        $status = '';
       
        if($cholesterol < 200):
            $status .= 'Low';
        endif;

        if ($cholesterol >= 200 && $cholesterol < 240):
            $status .= 'Borderline High';
        endif;
        
        if ($cholesterol >= 240):
            $status .= 'High';
        endif;
      
       return $status;
    }

    private function lipoproteinStatus($hdl){
        $status = '';
       
        if($hdl < 40):
            $status .= 'Bad';
        endif;

        if ($hdl >= 40 && $hdl < 60):
            $status .= 'Good';
        endif;

        if ($hdl >= 60):
            $status .= 'Great';
        endif;
      
       return $status;
    }
    public function index() {
        $id = session('subscriber_id');

        $subscriber = User::findOrFail($id);

        $cholesterol = Cholesterol::where('subscriber_id', $id)->first();

        return view('subscriber.records.cholesterol.index', [
            'cholesterol' => $cholesterol,
            'subscriber' => $subscriber
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'total_cholesterol' => 'required|numeric|min:130|max:320|',
            'high_density_lipoprotein' => 'required|numeric|min:20|max:100|',
        ]);

        $subscriber_id = session('subscriber_id');

        $subscriber = User::findOrFail($subscriber_id);

        $cholesterol['total_cholesterol'] = $request->total_cholesterol;
        $cholesterol['high_density_lipoprotein'] = $request->high_density_lipoprotein;
        
        $cholesterol['total_cholesterol_status'] = $this->cholesterolStatus($cholesterol['total_cholesterol']);
        $cholesterol['hdl_status'] = $this->lipoproteinStatus($cholesterol['high_density_lipoprotein']);

        $cholesterol = Cholesterol::updateOrCreate([
            'subscriber_id' => $subscriber_id
        ], $cholesterol);

        if ( $cholesterol ): 
            // $cholesterol->notify(new CholesterolAlert($subscriber));
            return back()->withSuccess('You have successfully entered your Cholesterol details');
        else: 
            return back()->withError('Please try again');
        endif;
    }
}
