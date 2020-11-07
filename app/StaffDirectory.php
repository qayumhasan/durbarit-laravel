<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffDirectory extends Model
{
    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNumberAttribute()
    {
        $str = 'durbarit';
        $this->attributes['number'] =$str.rand();
    }
}
