<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Driver extends Controller
{
    public function viewProfile(){
        return view('frontend.pages.driver-profile');
    }
}
