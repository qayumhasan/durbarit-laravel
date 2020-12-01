<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
     /**
     * Get the phone record associated with the user.
     */
    public function staff()
    {
        return $this->hasOne('App\StaffDirectory','id','staff_id')->withDefault();
    }

    public function attendencecountvalue()
    {
        return $this->hasOne('App\AttendanceCount','staff_id','staff_id')->withDefault();
    }


    

   
}
