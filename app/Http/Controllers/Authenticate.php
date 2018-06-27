<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_data;
use App\DriverData;

class Authenticate extends Controller
{

    public function join(Request $request){
        return view('frontend.pages.join');
    }

    public function registerDriver(Request $request){
        if($request->isMethod('post')){
            if($request->password !== $request->repass){
                return redirect()
                    ->to('/sign-up/driver')
                    ->with('error', 'Passwords didn\'t match!! Please try again!!')
                    ->withInput();
            }elseif ($request->email !== $request->reemail){
                return redirect()
                    ->to('/sign-up/driver')
                    ->with('error', 'Email didn\'t match!! Please try again!!')
                    ->withInput();
            }
            elseif (!isset($request->checkbox)){
                return redirect()
                    ->to('/sign-up/driver')
                    ->with('error', 'Please Agree to the Privacy Agreement & Terms of Conditions. !!')
                    ->withInput();
            }
            $user = new User();
            $usd = new User_data();
            $dd = new DriverData();
            if($user->validate($request->all()) && $usd->validate($request->all()) && $dd->validate($request->all())){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->role = 'driver';
                $user->save();
                $last_id = User::orderBy('id', 'desc')->first();;
                $usd->user_id = $last_id->id;
                $usd->last_name = $request->last_name;
                $usd->dob = $request->dob;
                $usd->gender = $request->gender;
                $usd->address = $request->address;
                $usd->picture = $request->picture;
                $usd->id_card = $request->id_card;
                $usd->status = $request->status;
                $usd->save();
                $dd->user_id = $last_id->id;
                $dd->car_reg = $request->car_reg;
                $dd->driving_license = $request->driving_license;
                $dd->expiry = $request->expiry;
                $dd->uploads = $request->uploads;
                $dd->save();
                return redirect()
                    ->to('/sign-up/success')
                    ->with('success', 'The Driver is created successfully!!');
            }else{
                return redirect()
                    ->to('/admin/create-driver')
                    ->withErrors($user->errors())
                    ->withInput();
            }
        }
        return view('frontend.pages.register-driver');
    }

    public function registerCustomer(Request $request){
        if($request->isMethod('post')){
            if($request->password !== $request->repass){
                return redirect()
                    ->to('/sign-up/customer')
                    ->with('error', 'Passwords didn\'t match!! Please try again!!')
                    ->withInput();
            }elseif ($request->email !== $request->reemail){
                return redirect()
                    ->to('/sign-up/customer')
                    ->with('error', 'Email didn\'t match!! Please try again!!')
                    ->withInput();
            }
            elseif (!isset($request->checkbox)){
                return redirect()
                    ->to('/sign-up/customer')
                    ->with('error', 'Please Agree to the Privacy Agreement & Terms of Conditions. !!')
                    ->withInput();
            }
            $user = new User();
            $usd = new User_data();
            if($user->validate($request->all()) && $usd->validate($request->all())){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->role = 'customer';
                $user->save();
                $last_id = User::orderBy('id', 'desc')->first();
                $usd->user_id = $last_id->id;
                $usd->last_name = $request->last_name;
                $usd->dob = $request->year.'-'.$request->month.'-'.$request->day;
                $usd->gender = $request->gender;
                $usd->address = $request->address;
                $usd->id_card = $request->id_card;
                $usd->save();
                return redirect()
                    ->to('/sign-up/success')
                    ->with('success', 'Registration is successful !!');
            }else{
                return redirect()
                    ->to('/sign-up/customer')
                    ->withErrors($usd->errors())
                    ->withInput();
            }
        }
        return view('frontend.pages.register-customer');
    }

    public function loginDriver(Request $request){
        return view('frontend.pages.login');
    }
    public function success(Request $request){
        return view('frontend.pages.register-success');
    }

}
