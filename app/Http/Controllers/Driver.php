<?php

namespace App\Http\Controllers;

use App\User_data;
use App\User;
use App\DriverData;
use App\RideOffers;
use App\RideDescriptions;
use App\VehiclesData;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Driver extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('Driver');
    }

    public function viewProfile($id){
        $user = User::find($id);
        $usd = User_data::where('user_id',$id)->first();
        return view('frontend.pages.driver-profile',[
            'usd' => $usd,
            'user' => $user
        ]);
    }

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
                ->to('/d/profile/'.$id)
                ->with('success', 'Your Profile Updated Successfully!!');
        }
        return view('frontend.pages.driver-profile-edit',[
            'user' => $user,
            'usd' => $usd,
            'dd' => $dd
        ]);
    }


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
                    ->to('/d/profile/'.$id)
                    ->with('success', 'Your Profile Picture Updated Successfully !!');
            }
        }
    }


    public function editPassword(Request $request,$id){
        $user = User::find($id);
        if($request->isMethod('post')){
            if(Hash::check($request->oldpass,$user->password ) == false){
                return redirect()
                    ->to('d/profile/edit/12')
                    ->with('error','Password Did not matched !!');
            }
            elseif ($request->newpass != $request->repass){
                return redirect()
                    ->to('d/profile/edit/12')
                    ->with('error','Wrong password entered');
            }
            elseif(strlen($request->newpass) < 6 ){
                return redirect()
                    ->to('d/profile/edit/12')
                    ->with('error','Password Must be 6 characters or greater !');
            }
            else{
                $user->password = bcrypt($request->newpass);
                $user->save();
                return redirect()
                    ->to('d/profile/edit/12')
                    ->with('success','Password Changed Successfully !');
            }
        }
    }

    public function offerRide(Request $request){
        $ride_offer = new RideOffers();
        if($request->isMethod('post')){
            $ride_offer->request_id = 1;
            $ride_offer->offer_by = 1;
            $ride_offer->origin = $request->origin;
            $ride_offer->destination = $request->destination;
            $ride_offer->price_per_seat = $request->price_per_seat;
            $ride_offer->total_seats = $request->total_seats;
            $ride_offer->total_seats = $request->total_seats;
            $d_f_date = $request->d_date .' '. $request->d_hour.':'.$request->d_minute;
            $d_date = DateTime::createFromFormat('Y-m-d H:i \P\M', $d_f_date);
            $ride_offer->departure_time = $d_date;
            $a_f_date = $request->a_date .' '. $request->a_hour.':'.$request->a_minute;
            $a_date = DateTime::createFromFormat('Y-m-d H:i \P\M', $a_f_date);
            $ride_offer->arrival_time = $a_date;
            $ride_offer->save();
            $ride_offer_id = $ride_offer->id;
            $vehicles_data = new VehiclesData();
            $vehicles_data->ride_offer_id = $ride_offer_id;
            $vehicles_data->own_vehicle = $request->own_vehicle;
            $vehicles_data->car_type = $request->car_type;
            $vehicles_data->car_plate_no = $request->car_plate_no;
            $vehicles_data->luggage_no = $request->luggage_no;
            $vehicles_data->save();
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

            return redirect()
                ->to('d/offer-ride')
                ->with('success', 'Ride Created Successfully !!');
        }
        return view('frontend.pages.offer-ride', [
            'js' => 'frontend.pages.js.offer-ride-js'
        ]);
    }

}
