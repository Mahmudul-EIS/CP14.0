<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RideDescriptions extends Model
{
    protected $rules = array(
        'ride_offer_id'  => 'required'
    );

    protected $errors;

    protected $table = 'ride_descriptions';

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
