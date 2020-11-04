<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne('App\User','id','user_id')->withDefault();
    }

    public function getPaymentAttribute()
    {
        if($this->attributes['payment_method']==1){
            return 'Stripe';
        }elseif($this->attributes['payment_method']==2){
            return "sslcommerz";
        }
    }
    public function getPaymentMethodAttribute()
    {
        if($this->attributes['payment_method']==0){
            return 'UnPaid';
        }else{
            return 'Paid';
        }
    }
    
}
