<?php

namespace App\Http\Controllers\MedicalPersonal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CareTeam;

use Auth;

class RequestController extends Controller
{
    public function viewApprovedRequests() {
        $careTeams = CareTeam::where(['user_id' => Auth::user()->id, 'status' => 'approved'])->get();
      
        return view('medical-personal.careTeamRequests.approve', [
            'careTeams' => $careTeams
        ]);
    }

    public function viewPendingRequests() {
        $careTeams = CareTeam::where(['user_id' => Auth::user()->id, 'status' => 'pending'])->get();
        return view('medical-personal.careTeamRequests.pending', [
            'careTeams' => $careTeams
        ]);
    }

    public function viewDisapprovedRequests() {
        $careTeams = CareTeam::where(['user_id' => Auth::user()->id, 'status' => 'dispproved'])->get();
        return view('medical-personal.careTeamRequests.disapprove', [
            'careTeams' => $careTeams
        ]);
    }
}
