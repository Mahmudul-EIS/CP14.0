<?php

namespace App\Http\Controllers;

use DB;
use App\User_data;
use App\User;
use App\Ride_request;
use App\RideOffers;
use App\RideDescriptions;
use App\VehiclesData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Customer extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('Customer');
    }

    public function viewProfile($id){
        $usd = User_data::where('user_id',$id)->first();
        return view('frontend.pages.customer-profile',[
            'usd' => $usd
        ]);
    }

    public function editProfile(Request $request,$id){
        $user = User::find($id);
        $usd = User_data::where('user_id',$id)->first();
            if($request->isMethod('post')) {
                $user->name = $request->name;
                $user->save();
                $usd->last_name = $request->last_name;
                $usd->dob = $request->year.'-'.$request->month.'-'.$request->day;
                $usd->gender = $request->gender;
                $usd->address = $request->address;
                $usd->id_card = $request->id_card;
                $usd->save();
                return redirect()
                    ->to('/c/profile/'.$id)
                    ->with('success', 'Your Account Updated Successfully !!');
            }
        return view('frontend.pages.customer-profile-edit', [
                'user' => $user,
                'usd' => $usd
            ]);
    }

    public function imageUpload(Request $request,$id){
        $usd = User_data::where('user_id',$id)->first();
        if($request->isMethod('post')){
            if($request->hasFile('picture')) {
                $image = $request->file('picture');
                $name = str_slug($id).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/customers');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $usd->picture = $name;
                $usd->save();
                return redirect()
                    ->to('/c/profile/'.$id)
                    ->with('success', 'Your Profile Picture Updated Successfully !!');
            }
        }
    }
    public function editPassword(Request $request,$id){
        $user = User::find($id);
        if($request->isMethod('post')){
            if(Hash::check($request->oldpass,$user->password ) == false){
                return redirect()
                    ->to('c/profile/edit/8')
                    ->with('error','Password Did not matched !!');
            }
            elseif ($request->newpass != $request->repass){
                return redirect()
                    ->to('c/profile/edit/8')
                    ->with('error','Wrong password entered');
            }
            elseif(strlen($request->newpass) < 6 ){
                return redirect()
                    ->to('c/profile/edit/8')
                    ->with('error','Password Must be 6 characters or greater !');
            }
            else{
                $user->password = bcrypt($request->newpass);
                $user->save();
                return redirect()
                    ->to('c/profile/edit/8')
                    ->with('success','Password Changed Successfully !');
            }
        }
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

    public function riderRequest(Request $request){
        $user = Auth::id();
        $ride_request = new Ride_request();

        if($request->isMethod('post')){
            $ride_request->user_id = $user;
            $ride_request->from = $request->from;
            $ride_request->to = $request->to;
            $ride_request->departure_date = $request->departure_date;
            if(isset($request->seat_required)){
                $ride_request->seat_required = $request->seat_required;
            }else{
                $ride_request->seat_required = 1;
            }
            /*echo $ride_request;
            exit();*/
            if($ride_request->save()){
                return redirect()
                    ->back()
                    ->with('success', 'The ride request was created successfully!');
            }else{
                return redirect($request->path())
                    ->back()
                    ->with('error', 'The ride request couldn\'t created!');
            }
            // echo $user->id;
        }else {
            return redirect($request->path())
                ->back()
                ->with('error', 'The method not allowed!');
        }
    }

}
