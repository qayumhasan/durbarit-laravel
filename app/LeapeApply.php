<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeapeApply extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public function applyType()
    {
        return $this->hasOne('App\LeaveType','id','leave_type');
    }
}
