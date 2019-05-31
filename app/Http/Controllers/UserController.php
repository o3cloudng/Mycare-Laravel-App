<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Diagnosis;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $user = Auth::user();
        $diagnosis =  Diagnosis::where('user_id', $user->id)->get();
        return view('home', [
            'user' => $user,
            'diagnosis' => $diagnosis
        ]);
    }
}
