<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
        /**
     * Get the category for the Project.
     */
    public function category()
    {
        return $this->hasOne('App\Category','id','cat_id')->withDefault();
    }

    public function product()
    {
        return $this->hasOne('App\product','id','product_id')->withDefault();
    }


}
