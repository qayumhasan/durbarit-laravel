<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    protected $guarded = [];

    public function getproductAttribute($value)
    {
        return json_decode($value);
    }
}
