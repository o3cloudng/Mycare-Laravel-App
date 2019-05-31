<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //


    public function index() {
    	return view('Pages.index');
    }


    public function error(){
		return view('errors.noRole');
	}

    public function notfound(){
		return view('errors.404');
	}
    public function noRole(){
		return view('errors.noRole');
	}
	
	public function pagenotfound(){
		return view('errors.404');
	}
}
