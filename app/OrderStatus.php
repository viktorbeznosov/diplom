<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = array('name','color');

    public function order(){
        return $this->belongsToMany('App\Order');
    }
}
