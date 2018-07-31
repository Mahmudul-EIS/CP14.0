<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiclesData extends Model
{
    protected $rules = array(
        'user_id'  => 'required',
        'car_plate_no' => 'required',
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
