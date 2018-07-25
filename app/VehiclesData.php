<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiclesData extends Model
{
    protected $rules = array(
        'ride_offer_id'  => 'required'
    );

    protected $errors;

    protected $table = 'vehicles_data';

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
