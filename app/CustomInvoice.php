<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomInvoice extends Model
{
    public function user()
    {
        return $this->hasOne('App\User','id','customer')->withDefault();
    }
}
