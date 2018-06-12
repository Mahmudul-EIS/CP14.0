<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Frontend extends Controller
{

    /**
     * Home - homepage of the system
    */
    public function home(Request $request){
        return view('frontend.pages.home', [
            'slug' => 'home',
            'modals' => 'frontend.pages.modals.home-modals'
        ]);
    }

}
