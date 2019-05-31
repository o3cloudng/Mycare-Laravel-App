<?php

namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;
use App\{User, Http\Controllers\Controller, Notifications\UserRegisteredSuccessfully, CareTeam
};
use Spatie\Permission\Models\Role;
use Session;

class CareTeamController extends Controller
{
    public function register(Request $request) {
        $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'numeric',
        ]);
        $subscriber_id = session('subscriber_id');
       
   
   
         $user = User::create([
                 'name' => $request->name,
                 'email' => $request->email,
                 'phone' => $request->phone,
                 'token' => str_random(40) . time(),
                 'password' => bcrypt('secret'),
             ]);

        $user->assignRole( $request->role );
        if ( $user ) {
            $user->notify(new UserRegisteredSuccessfully($user));
            return redirect('care-team')->with('success', $user->name. ' has been added as a '. ucfirst($user->roles()->first()->name));
        } else {
            return redirect('care-team')->with('error', 'There was a problem adding this new user');
        }
    }

      /**
     * @param $token
     */
    public function activateUser($token = null)
    {
        $user = User::where('token', $token)->first();

        if (empty($user)) {
            return redirect()->to('/')
                ->with(['error' => 'Your activation code is either expired or invalid.']);
        }

        $user->update(['token' => null, 'active' => User::ACTIVE]);

        return redirect('password/reset')
            ->with(['success' => 'Congratulations! your account is now activated. Please reset the password']);
    }

    public function deleteUser($id) {

        $subscriber_id = session('subscriber_id');
        
        $user = User::findOrFail($id);
        
        if ($user->subscriber->id == $subscriber_id):
            //TODO: Find a way to reduce the number of queries being made
           
            $user->diagnosis->each(function($diagnosis) { 
                
              $diagnosis->medications()->delete();
            });
           
            $user->diagnosis()->delete();
            $user->delete();
            return back()->with('error', $user->name.' has been deleted successfully');
        else:
            return back()->with('error','Error deleting user');
        endif;

    }

    public function addUserToCareTeam(Request $request) {
        $subscriber_id = session('subscriber_id');
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();

        $careTeam = CareTeam::updateOrCreate([
            'subscriber_id' => $subscriber_id,
            'user_id' => $user_id
                ], 
            [
            'status' => 'pending'
        ]);
 
        return response()->json(['success' =>  'The user has been added', 'username' => $user->name]);
    }
}
