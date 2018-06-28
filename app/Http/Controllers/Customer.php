<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Customer extends Controller
{
    public function viewProfile(){
    return view('frontend.pages.customer-profile');
}
}
