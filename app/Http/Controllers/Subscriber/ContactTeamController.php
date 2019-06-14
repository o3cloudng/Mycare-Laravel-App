<?php

namespace App\Http\Controllers\Subscriber;

use App\ContactTeam;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


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
   
         $contactTeam = ContactTeam::create([
                 'name' => $request->name,
                 'email' => $request->email,
                 'phone' => $request->phone,
                 'subscriber_id' => $subscriber_id,
                 'description' => $request->description
             ]);

        if ( $contactTeam ) {
            return redirect('contact-team')->with('success', $contactTeam->name. ' has been added as a '. ucfirst($contactTeam->description) .' contact');
        } else {
            return redirect('contact-team')->with('error', 'There was a problem adding this new user');
        }
    }

    public function delete(Request $request) {

        $subscriber_id = session('subscriber_id');
        // dd($request->id);
        // return ['success' => 'has been removed from your contact team', 'id' => $request->id]);
        $contactTeam = ContactTeam::findOrFail($request->id);
        
         if ($contactTeam->subscriber_id == $subscriber_id) {
            $contactTeam->delete();
            return response()->json(['success' => $contactTeam->name.' has been removed from your contact team', 'name' => $contactTeam->name]);
        } else {
            return response()->json('error','Error deleting contact member');
       }
            

    }
}
