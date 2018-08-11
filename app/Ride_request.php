<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Ride_request extends Model
{
    //
    protected $fillable = [
        'user_id', 'from', 'to', 'departure_date','seat_required',
    ];

    protected $rules = array(
        'from'  => 'required',
        'to' => 'required',
        'departure_date' => 'required',
        'seat_required'=>'required'
    );
    protected $errors;

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
