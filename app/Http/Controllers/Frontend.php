<?php

namespace App\Http\Controllers;

use App\RideDescriptions;
use App\VehiclesData;
use Illuminate\Http\Request;
use App\User;
use App\User_data;
use App\RideOffers;
use App\DriverData;

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

    public function popular(Request $request){
        $ro = RideOffers::paginate(3);
        foreach ($ro as $r){
            $user = User::find($r->offer_by);
            $r->user = $user;
            $usd = User_data::where('user_id',$r->offer_by)->first();
            $r->usd = $usd;
            $dd = DriverData::where('user_id',$r->offer_by)->first();
            $r->dd = $dd;
        }
        return view('frontend.pages.popular',[
            'data' => $ro
        ]);
    }

    public function rideDetails(Request $request,$id){
        $ro = RideOffers::find($id);
        $rd = RideDescriptions::where('ride_offer_id',$id)->get();
        $ro->rd = $rd;
        $vd = VehiclesData::where('ride_offer_id',$id)->first();
        $ro->vd = $vd;
        $user = User::where('id',$ro->offer_by)->first();
        $ro->user = $user;
        $usd = User_data::where('user_id',$ro->offer_by)->first();
        $ro->usd = $usd;
        return view('frontend.pages.ride-details',[
            'data' => $ro,
            'js' => 'frontend.pages.js.ride-details-js'
        ]);
    }

}
