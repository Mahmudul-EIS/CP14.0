<?php

namespace App\Http\Controllers;

use App\Ride_request;
use App\RideBookings;
use App\User_data;
use App\User;
use App\DriverData;
use App\RideOffers;
use App\RideDescriptions;
use App\VehiclesData;
use App\RideComp;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class Driver extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('Driver');
    }

    public function viewProfile(){
        if(Auth::user()){
            $id = Auth::id();
            $user = User::find($id);
            $usd = User_data::where('user_id',$id)->first();
            if($user->role != 'driver'){
                return redirect()->back();
            }
            return view('frontend.pages.driver-profile',[
                'usd' => $usd,
                'user' => $user
            ]);
        }
    }

    /**
     * EditProfile - Profile edit functionality for driver
     * params - $request, takes post/get method data and changes them on database
    */
    public function editProfile(Request $request,$id){
        $user = User::find($id);
        $usd = User_data::where('user_id',$id)->first();
        $dd = DriverData::where('user_id',$id)->first();
        if($request->isMethod('post')){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            $usd->dob = $request->year.'-'.$request->month.'-'.$request->day;
            $usd->gender = $request->gender;
            $usd->address = $request->address;
            $usd->id_card = $request->id_card;
            $usd->contact = $request->contact;
            $usd->save();
            $dd->car_reg = $request->car_reg;
            $dd->driving_license = $request->driving_license;
            $dd->expiry = $request->expiry;
            $dd->save();
            return redirect()
                ->to('/d/profile/')
                ->with('success', 'Your Profile Updated Successfully!!');
        }
        return view('frontend.pages.driver-profile-edit',[
            'user' => $user,
            'usd' => $usd,
            'dd' => $dd
        ]);
    }


    /**
     * ImageUpload - function for uploading driver's profile picture
     * params - $request takes post method data and processes accordingly
    */
    public function imageUpload(Request $request,$id){
        $usd = User_data::where('user_id',$id)->first();
        if($request->isMethod('post')){
            if($request->hasFile('picture')) {
                $image = $request->file('picture');
                $name = str_slug($id).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/drivers');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $usd->picture = $name;
                $usd->save();
                return redirect()
                    ->to('/d/profile/')
                    ->with('success', 'Your Profile Picture Updated Successfully !!');
            }
        }
    }


    /**
     * EditPassword - function for editing driver account password
     * params - $request takes post/get request data and processes accordingly
    */
    public function editPassword(Request $request, $id){
        $user = User::find($id);
        if($request->isMethod('post')){
            if(Hash::check($request->oldpass, $user->password ) == false){
                return redirect()
                    ->to('d/profile/edit/12')
                    ->with('error','Password Did not matched !!');
            }
            elseif ($request->newpass != $request->repass){
                return redirect()
                    ->to('d/profile/edit/'.$id)
                    ->with('error','Wrong password entered');
            }
            elseif(strlen($request->newpass) < 6 ){
                return redirect()
                    ->to('d/profile/edit/'.$id)
                    ->with('error','Password Must be 6 characters or greater !');
            }
            else{
                $user->password = bcrypt($request->newpass);
                $user->save();
                return redirect()
                    ->to('d/profile/edit/'.$id)
                    ->with('success','Password Changed Successfully !');
            }
        }
    }

    /**
     * OfferRide - shows the offer ride page for drivers
     * takes post request with offer data and creates the offer
     * param - takes post and get request data as object
    */
    public function offerRide(Request $request){
        $req_id = $req_details = $ex_offer = '';
        if(isset($request->req) && $request->req != null){
            $req_id = $request->req;
        }
        if($req_id != ''){
            $req_details = Ride_request::find($req_id);
        }
        $ex_offer = RideOffers::where(['request_id' => $req_id])->first();
//        if($ex_offer){
//            return redirect('/')
//                ->with('error', 'Offer already created!!');
//        }
        $vd = VehiclesData::where(['user_id' => Auth::id()])->first();
        if($request->isMethod('post')){
            $ride_offer = new RideOffers();
            if($request->req_id != ''){
                $ride_offer->request_id = $request->req_id;
            }else{
                $ride_offer->request_id = 0;
            }
            $ride_offer->offer_by = Auth::id();
            $ride_offer->origin = $request->origin;
            $ride_offer->destination = $request->destination;
            $ride_offer->price_per_seat = $request->price_per_seat;
            $ride_offer->total_seats = $request->total_seats;
            $ride_offer->total_seats = $request->total_seats;
            $d_f_date = $request->d_date .' '. $request->d_hour.':'.$request->d_minute;
            //$d_date = new DateTime($d_f_date);
            $d_date = DateTime::createFromFormat('Y-m-d H:i \P\M', $d_f_date);
            $ride_offer->departure_time = $d_date;
            $a_f_date = $request->a_date .' '. $request->a_hour.':'.$request->a_minute;
            //$a_date = new DateTime($a_f_date);
            $a_date = DateTime::createFromFormat('Y-m-d H:i \P\M', $a_f_date);
            $ride_offer->arrival_time = $a_date;
            $ride_offer->save();
            $ride_offer_id = $ride_offer->id;
            if($request->vd_action == 'add'){
                $vehicles_data = new VehiclesData();
                $vehicles_data->user_id = Auth::id();
                $vehicles_data->car_type = $request->car_type;
                $vehicles_data->car_plate_no = $request->car_plate_no;
                $vehicles_data->luggage_limit = $request->luggage_limit;
                $vehicles_data->save();
                $ride_desc = new RideDescriptions();
                $ride_desc->ride_offer_id = $ride_offer_id;
                $ride_desc->key = 'vehicle_id';
                $ride_desc->value = $vehicles_data->id;
                $ride_desc->save();
            }else{
                $vd_data = VehiclesData::find($request->vd_id);
                $vd_data->car_type = $request->car_type;
                $vd_data->luggage_limit = $request->luggage_limit;
                $vd_data->save();
                $ride_desc = new RideDescriptions();
                $ride_desc->ride_offer_id = $ride_offer_id;
                $ride_desc->key = 'vehicle_id';
                $ride_desc->value = $request->vd_id;
                $ride_desc->save();
            }
            if($request->pets != ''){
                $ride_desc = new RideDescriptions();
                $ride_desc->ride_offer_id = $ride_offer_id;
                $ride_desc->key = 'pets';
                $ride_desc->value = $request->pets;
                $ride_desc->save();
            }
            if($request->music != ''){
                $ride_desc = new RideDescriptions();
                $ride_desc->ride_offer_id = $ride_offer_id;
                $ride_desc->key = 'music';
                $ride_desc->value = $request->music;
                $ride_desc->save();
            }
            if($request->smoking != ''){
                $ride_desc = new RideDescriptions();
                $ride_desc->ride_offer_id = $ride_offer_id;
                $ride_desc->key = 'smoking';
                $ride_desc->value = $request->smoking;
                $ride_desc->save();
            }
            if($request->back_seat != ''){
                $ride_desc = new RideDescriptions();
                $ride_desc->ride_offer_id = $ride_offer_id;
                $ride_desc->key = 'back_seat';
                $ride_desc->value = $request->back_seat;
                $ride_desc->save();
            }

            if($request->req_id != ''){
                $ride_book = new RideBookings();
                $ride_book->user_id = $request->req_user_id;
                $ride_book->ride_id = $ride_offer_id;
                $ride_book->status = 'booked';
                $ride_book->save();
            }

            return redirect()
                ->to('d/offer-ride')
                ->with('success', 'Ride Created Successfully !!');
        }
        return view('frontend.pages.offer-ride', [
            'data' => $req_details,
            'vd' => $vd,
            'req_id' => $req_id,
            'js' => 'frontend.pages.js.offer-ride-js'
        ]);
    }


    /**
     * RideDetails - returns the ride offer details
     * params - takes request and ride link
    */
    public function rideDetails(Request $request, $id){
        $user = User::find($id);
        $ro = RideOffers::find($id);
        $rideStart = new RideComp();
        $rd = RideDescriptions::where('ride_offer_id',$id)->get();
        $ro->rd = $rd;
        $vd = VehiclesData::where('ride_offer_id',$id)->first();
        $ro->vd = $vd;
        $user = User::where('id',$ro->offer_by)->first();
        $ro->user = $user;
        $usd = User_data::where('user_id',$ro->offer_by)->first();
        $ro->usd = $usd;
        if($request->isMethod('post')){
            if (Input::has('start_ride'))
                {
                    $rideStart->ride_id = $ro->id;
                    $rideStart->start_time = Carbon::now();
                    $rideStart->end_time = '0';
                    $rideStart->total_fair = '200';
                    $rideStart->save();
                    return view('frontend.pages.ride-details',[
                        'data' => $ro,
                        'js' => 'frontend.pages.js.ride-details-js'
                    ])->with('ride_id', $ro->id);
                }
            return view('frontend.pages.ride-details')->with('ride_id', $ro->id);
        }
        
        return view('frontend.pages.ride-details',[
            'data' => $ro,
            'js' => 'frontend.pages.js.ride-details-js'
        ])->with('ride_id', $ro->id);
    }

}
