<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class RideBookings extends Model
{
    protected $rules = array(
        'seat_booked' => 'required',
        'status'  => 'required'
    );

    protected $errors;

    protected $table = 'ride_bookings';

    public function validate($data)
    {
        $valid = Validator::make($data, $this->rules);
        if ($valid->fails())
        {
            $this->errors = $valid->errors();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
}
