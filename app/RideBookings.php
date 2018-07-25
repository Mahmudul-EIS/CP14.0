<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RideBookings extends Model
{
    protected $rules = array(
        'status'  => 'required',
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
