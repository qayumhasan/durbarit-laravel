<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public function staff()
    {
        return $this->hasOne('App\StaffDirectory','id','staff_id')->withDefault();
    }
}
