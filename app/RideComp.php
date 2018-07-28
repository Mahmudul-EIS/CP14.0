<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RideComp extends Model
{
    protected $fillable = [
        'ride_id', 'start_time', 'end_time', 'total_fair',
    ];

    protected $rules = array(
        'ride_id'  => 'required',
        'start_time'  => 'required',
        'end_time' => 'required',
        'total_fair' => 'required'
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
