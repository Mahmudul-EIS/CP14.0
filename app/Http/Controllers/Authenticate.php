<?php

namespace App\Http\Controllers;

use App\VehiclesData;
use Illuminate\Http\Request;
use App\User;
use App\User_data;
use App\DriverData;
use App\RideRequestTemp;
use Illuminate\Support\Facades\Session;

class Authenticate extends Controller
{

    public function join(Request $request){
        return view('frontend.pages.join');
    }

    public function registerDriver(Request $request){
        $errors = array();
        if($request->isMethod('post')){
            if($request->password !== $request->repass){
                $errors[] = 'Passwords didn\'t match !!';
            }
            if ($request->email !== $request->reemail){
                $errors[] = 'Email didn\'t match !!';
            }
            if (!isset($request->checkbox)){
                $errors[] = 'Please Agree to the Privacy Agreement & Terms of Conditions. !!';
            }
            $user = new User();
            $usd = new User_data();
            $dd = new DriverData();
            $vd = new VehiclesData();
            $data = $request->all();
            if(!$user->validate($data)){
                $user_e = $user->errors();
                foreach ($user_e->messages() as $k => $v){
                    foreach ($v as $e){
                        $errors[] = $e;
                    }
                }
            }
            if(!$usd->validate($data)){
                $usd_e = $usd->errors();
                foreach ($usd_e->messages() as $k => $v){
                    foreach ($v as $e){
                        $errors[] = $e;
                    }
                }
            }
            if(!$dd->validate($data)){
                $dd_e = $dd->errors();
                foreach ($dd_e->messages() as $k => $v){
                    foreach ($v as $e){
                        $errors[] = $e;
                    }
                }
            }
            if(empty($errors)){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->role = 'driver';
                $user->save();
                $last_id = User::orderBy('id', 'desc')->first();;
                $usd->user_id = $last_id->id;
                $usd->last_name = $request->last_name;
                $usd->dob = $request->year.'-'.$request->month.'-'.$request->day;
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
                $vd->user_id = $last_id->id;
                $vd->car_plate_no = $dd->car_reg = $request->car_reg;
                $vd->save();
                return redirect()
                    ->to('/sign-up/success')
                    ->with('success', 'The Driver is created successfully!!');
            }else{
                return redirect()
                    ->to('/sign-up/driver')
                    ->with('errors',$errors)
                    ->withInput();
            }
        }
        return view('frontend.pages.register-driver');
    }

    public function registerCustomer(Request $request){
        $errors = array();
//        $input = $request->all();
//        dd($input);
        if($request->isMethod('post')){
            if($request->password !== $request->repass){
                $errors[] = 'Passwords didn\'t match !!';
            }
            if ($request->email !== $request->reemail){
                $errors[] = 'Email didn\'t match !!';
            }
            if (!isset($request->checkbox)){
                $errors[] = 'Please Agree to the Privacy Agreement & Terms of Conditions. !!';
            }
            $user = new User();
            $usd = new User_data();
            $rrt = new RideRequestTemp();
            $data = $request->all();
            if(!$user->validate($data)){
                $user_e = $user->errors();
              foreach ($user_e->messages() as $k => $v){
                  foreach ($v as $e){
                      $errors[] = $e;
                  }
              }
            }
            if(!$usd->validate($data)){
                $usd_e = $usd->errors();
                foreach ($usd_e->messages() as $k => $v){
                    foreach ($v as $e){
                        $errors[] = $e;
                    }
                }
            }
            if(!$rrt->validate($data)){
                $rrt_e = $rrt->errors();
                foreach ($rrt_e->messages() as $k => $v){
                    foreach ($v as $e){
                        $errors[] = $e;
                    }
                }
            }
            if(empty($errors)){
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
                if($request->from != ''){
                    $rrt->user_id = $last_id->id;
                    $rrt->place_from = $request->from;
                    $rrt->place_to = $request->to;
                    $rrt->departure_date = $request->departure_date;
                    $rrt->seat_required = 1;
                    $rrt->status = 'processing';
                    $rrt->save();
                }
                return redirect()
                    ->to('/sign-up/success')
                    ->with('success', 'Registration is successful !!');
            }else{
                return redirect()
                    ->to('/sign-up/customer')
                    ->with('errors',$errors)
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
