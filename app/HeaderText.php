<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderText extends Model
{
     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'details' => 'array',
    // ];

    public function scopeActive($query,$type)
    {
        return $query->where('type', $type)->first();
    }
}
