<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class User_data extends Model
{

    protected $rules = array(
        'dob'  => 'required',
        'address'  => 'required',
        'gender' => 'required'
    );

    protected $errors;

    protected $table = 'users_data';

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
