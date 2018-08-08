<?php

namespace App\Http\Controllers;

use App\RideBookings;
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

    public function viewProfile(){
        if(Auth::user()){
            $id = Auth::id();
            $user = User::find($id);
            $usd = User_data::where('user_id',$id)->first();
            if($user->role != 'customer'){
                return redirect()->back();
            }
            return view('frontend.pages.customer-profile',[
                'usd' => $usd,
                'user' => $user
            ]);
        }
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
                    ->to('/c/profile/')
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
                    ->to('/c/profile/')
                    ->with('success', 'Your Profile Picture Updated Successfully !!');
            }
        }
    }
    public function editPassword(Request $request,$id){
        $user = User::find($id);
        if($request->isMethod('post')){
            if(Hash::check($request->oldpass,$user->password ) == false){
                return redirect()
                    ->to('c/profile/edit/'.$id)
                    ->with('error','Password Did not matched !!');
            }
            elseif ($request->newpass != $request->repass){
                return redirect()
                    ->to('c/profile/edit/'.$id)
                    ->with('error','Wrong password entered');
            }
            elseif(strlen($request->newpass) < 6 ){
                return redirect()
                    ->to('c/profile/edit/'.$id)
                    ->with('error','Password Must be 6 characters or greater !');
            }
            else{
                $user->password = bcrypt($request->newpass);
                $user->save();
                return redirect()
                    ->to('c/profile/edit/'.$id)
                    ->with('success','Password Changed Successfully !');
            }
        }
    }

    /**
     * Bookings - shows the customer ride bookings
    */
    public function bookings(Request $request){
        $bookings = RideBookings::where(['user_id' => Auth::id()])->where(['status' => 'booked'])->get();
        foreach($bookings as $book){
            $ride_details = RideOffers::find($book->ride_id);
            $book->ride_details = $ride_details;
            $ride_desc = RideDescriptions::where(['ride_offer_id' => $book->ride_id])
                ->where(['key' => 'vehicle_id'])
                ->first();
            $vd = VehiclesData::find($ride_desc->value);
            $book->vd = $vd;
        }
        return view('frontend.pages.bookings', [
            'data' => $bookings
        ]);
    }

    public function rideDetails(Request $request, $link){
        $ro = RideOffers::where('link', $link)->first();
        $rd = RideDescriptions::where('ride_offer_id', $ro->id)->get();
        $ro->rd = $rd;
        $user = User::find($ro->offer_by);
        $ro->user = $user;
        $vd = VehiclesData::where('user_id', $user->id)->first();
        $ro->vd = $vd;
        $usd = User_data::where('user_id', $ro->offer_by)->first();
        $ro->usd = $usd;
        $bookings = RideBookings::where(['ride_id' => $ro->id])
            ->where(function($q){
                $q->where(['status' => 'booked'])
                    ->orWhere(['status' => 'confirmed']);
            })
            ->get();
        foreach($bookings as $book){
            $requester = User::find($book->user_id);
            $book->requester = $requester;
            $ud = User_data::where(['user_id' => $book->user_id])->first();
            $book->ud = $ud;
        }
        $ro->bookings = $bookings;
        return view('frontend.pages.ride-details',[
            'data' => $ro,
            'js' => 'frontend.pages.js.ride-details-js',
            'modals' => 'frontend.pages.modals.ride-details-modals'
        ]);
    }

    /**
     * Search - function for searching drivers
     */
    public function search(Request $request){
        if($request->isMethod('post')){
            //dd($request->all());
            $ride_request = new Ride_request();
            $ride_request->user_id = Auth::id();
            $ride_request->from = $request->from;
            $ride_request->to = $request->to;
            $ride_request->departure_date = date('Y-m-d H:i:s', strtotime($request->departure_date));
            if(isset($request->seat_required)){
                $ride_request->seat_required = $request->seat_required;
            }else{
                $ride_request->seat_required = 1;
            }
            if($ride_request->save()){
                return redirect($request->url())
                    ->with('success', 'The ride request was created successfully!');
            }else{
                return redirect($request->url())
                    ->with('error', 'The ride request couldn\'t created!');
            }
        }
            return view('frontend.pages.rider-index');
    }

}
