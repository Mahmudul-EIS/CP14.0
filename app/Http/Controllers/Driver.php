<?php

namespace App\Http\Controllers;

use App\User_data;
use App\User;
use App\DriverData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Driver extends Controller
{
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
}
