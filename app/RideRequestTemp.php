<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class RideRequestTemp extends Model
{
    protected $fillable = [
        'from', 'to', 'departure_date',
    ];

    protected $rules = array(
        'from'  => 'required',
        'to' => 'required',
        'departure_date' => 'required',
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
