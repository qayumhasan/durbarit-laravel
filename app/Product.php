<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getreqularpricefetureforproductdetailsAttribute($value)
    {
        $feature =$this->attributes['reqular_price_feture'];
        
        return explode(',',$feature);
    }
    public function getpremiumpricefetureforproductdetailsAttribute($value)
    {
        $feature =$this->attributes['premium_price_feture'];
        
        return explode(',',$feature);
    }
}
