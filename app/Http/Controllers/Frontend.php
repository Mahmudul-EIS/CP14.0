<?php

namespace App\Http\Controllers;

use App\Ride_request;
use App\RideBookings;
use App\RideDescriptions;
use App\VehiclesData;
use Illuminate\Http\Request;
use App\User;
use App\User_data;
use App\RideOffers;
use App\DriverData;
use App\GuestRequests;
use App\RideRequestTemp;
use Auth;

class Frontend extends Controller
{

    /**
     * Home - homepage of the system
    */
    public function home(Request $request){
        $reqs = Ride_request::where('departure_date', '>=', date('Y-m-d'))
            ->get();
        foreach($reqs as $req){
            $user = User::find($req->user_id);
            $user_data = User_data::where(['user_id' => $req->user_id])->first();
            $req->user_details = $user;
            $req->user_data = $user_data;
            if(Auth::check()){
                $ex_offers = RideOffers::where(['request_id' => $req->id])
                    ->where('offer_by', '!=', 'NULL')
                    ->first();
                if($ex_offers){
                    $req->exx = 'yes';
                }
            }
        }
        $offers_today = RideOffers::where('departure_time', '>=', date('Y-m-d H:s'))
            ->get();
        return view('frontend.pages.home', [
            'reqs' => $reqs,
            'slug' => 'home',
            'modals' => 'frontend.pages.modals.home-modals',
            'js' => 'frontend.pages.js.home-js'
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

    public function rideDetails(Request $request,$link){
        $ro = RideOffers::where('link',$link)->first();
        $rd = RideDescriptions::where('ride_offer_id',$ro->id)->get();
        $ro->rd = $rd;
        $user = User::where('id', $ro->offer_by)->first();
        $ro->user = $user;
        $usd = User_data::where('user_id', $ro->offer_by)->first();
        $ro->usd = $usd;
        $vd = VehiclesData::where('user_id', $user->id)->first();
        $ro->vd = $vd;
        $bookings = RideBookings::where(['ride_id' => $ro->id])->get();
        $ro->bookings = $bookings;
        return view('frontend.pages.ride-details',[
            'data' => $ro,
            'js' => 'frontend.pages.js.ride-details-js',
            'modals' => 'frontend.pages.modals.ride-details-modals'
        ]);
    }
    public function guestRequests(Request $request){
        $gr = new GuestRequests();
        $gr->ride_offer_id = $request->ride_offer_id;
        $gr->token = $request->token;
        $gr->status = 'processing';
        $gr_id = $gr->id;
        if($gr->save()){
            return redirect('/sign-up/customer/')
                ->with('gr_id',$gr_id);
        }else{
            return redirect()
                ->back();
        }
    }
    public function search(){

    }
}
