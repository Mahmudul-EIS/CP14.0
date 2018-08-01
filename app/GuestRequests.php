<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestRequests extends Model
{
    protected $fillable = [
        'ride_offer_id'];

    protected $table = 'guest_requests';

    protected $rules = array(
        'ride_offer_id'  => 'required'
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
