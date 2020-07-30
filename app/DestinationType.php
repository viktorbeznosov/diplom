<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationType extends Model
{
    protected $fillable = [
        'name'
    ];

    protected function order(){
        return $this->belongsTo('App\Order');
    }
}
