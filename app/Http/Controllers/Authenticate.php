<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authenticate extends Controller
{

    public function join(Request $request){
        return view('frontend.pages.join');
    }

    public function registerDriver(Request $request){
        return view('frontend.pages.register-driver');
    }

    public function registerCustomer(Request $request){
        return view('frontend.pages.register-customer');
    }

    public function loginDriver(Request $request){
        return view('frontend.pages.login');
    }

}
