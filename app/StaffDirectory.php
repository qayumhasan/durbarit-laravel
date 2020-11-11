<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffDirectory extends Model
{
    
    public function getnameAttribute($value)
    {
      return "{$this->first_name} {$this->last_name}";
    }
    public function getmaritalAttribute($value)
    {
      return ucfirst($this->marital_status);
    }
    public function getgenderAttribute($value)
    {
     if($this->gender_id == 1){
         return 'Male';
     }elseif($this->gender_id == 2){
        return 'FeMale';
     }else{
         return 'Others';
     }
    }

      /**
     * Get the phone record associated with the user.
     */
    public function staffrole()
    {
        return $this->hasOne('App\StaffRole','id','role')->withDefault();
    }
    public function department()
    {
        return $this->hasOne('App\Department','id','department_id')->withDefault();
    }
    public function designation()
    {
        return $this->hasOne('App\Designation','id','designation_id')->withDefault();
    }

    public function attendance()
    {
        return $this->hasOne('App\Attendance','id','staff_id')->withDefault();
    }
}
