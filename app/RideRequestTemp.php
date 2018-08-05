<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RideRequestTemp extends Model
{
    protected $fillable = [
        'user_id', 'from', 'to', 'departure_date','seat_required',
    ];

    protected $rules = array(
        'user_id'  => 'required',
        'from'  => 'required',
        'to' => 'required',
        'departure_date' => 'required',
        'seat_required'=>'required'
    );
    protected $errors;
    protected $table = 'ride_request_temp';

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
