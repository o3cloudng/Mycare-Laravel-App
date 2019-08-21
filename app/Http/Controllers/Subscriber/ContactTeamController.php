<?php

namespace App\Http\Controllers\Subscriber;

use App\ContactTeam;
use App\Http\Controllers\Controller;
use App\Notifications\ContactTeamNotify;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;


class ContactTeamController extends Controller
{
    public function index() {
        $subscriber_id = session('subscriber_id');
        $subscriber = User::findOrFail($subscriber_id);
        $contactTeams = ContactTeam::where('subscriber_id', $subscriber_id)->get();
        return view('subscriber.contact-team.index', [
            'contactTeams' => $contactTeams,
            'subscriber' => $subscriber
        ]);
    }
    public function store(Request $request) {
        $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'numeric',
                'description' => 'required'
        ]);
        $subscriber_id = session('subscriber_id');
        $user = User::find($subscriber_id);

        $contactTeamExits = ContactTeam::where('email', $request->email)->where('subscriber_id', $subscriber_id)->first();
        if($contactTeamExits) {
            return redirect('contact-team')->with('error', $request->email.' has already been added.');
        }
   
         $contactTeam = ContactTeam::create([
                 'name' => $request->name,
                 'email' => $request->email,
                 'phone' => $request->phone,
                 'subscriber_id' => $subscriber_id,
                 'description' => $request->description
             ]);

         $contactTeam = ContactTeam::where('email', $request->email)->where('subscriber_id', $subscriber_id)->first();

         $arr = ['contactTeam' => $contactTeam];
         ContactTeam::find($contactTeam->id)->notify(new ContactTeamNotify($contactTeam));
         // ContactTeam::findOrFail('subscriber_id', $subscriber_id)->notify(new ContactTeamNotify);
         

        if ( $contactTeam ) {
            return redirect('contact-team')->with('success', $contactTeam->name. ' has been added as a '. ucfirst($contactTeam->description) .' contact');
        } else {
            return redirect('contact-team')->with('error', 'There was a problem adding this new user');
        }
    }



    // public function delete($id){
  
    //     $contactTeam = ContactTeam::find($id);
    //     if(is_null($contactTeam)){
    //         return back()->with('error','Blood Pressure does not exist');
    //     }else{
    //         $contactTeam->delete();
    //         return back()->with('success','Blood Pressure deleted successfully');
    //     }


    //     Utility::errorLog($e);
    //     return back();
   
    // }


    public function delete($id) {

        $subscriber_id = session('subscriber_id');
        $contactTeam = ContactTeam::findOrFail($id);
        
         if ($contactTeam->subscriber_id == $subscriber_id) {
            $contactTeam->delete();
             return back()->with('success',$contactTeam->name.' has been removed from your contact team');
            // return response()->json(['success' => $contactTeam->name.' has been removed from your contact team', 'name' => $contactTeam->name]);
        } else {
            return response()->json('error','Error deleting contact member');
       }
            

    }
}
