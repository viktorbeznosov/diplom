<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = array(
        'name',
        'user_id',
        'destination_type_id',
        'state',
        'street',
        'house',
        'flat',
        'comment',
        'status_id'
    );

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function status(){
        return $this->hasOne('App\OrderStatus', 'id', 'status_id');
    }

    public function destination(){
        return $this->hasOne('App\DestinationType', 'id', 'destination_type_id');
    }

    public function goods(){
        return $this->belongsToMany('App\Good','order_good', 'order_id','good_id')->withPivot(['id','quantity']);
    }

    public function getTotalPrice(){
        $total = 0;
        foreach ($this->goods()->get() as $good){
            $total += $good->price * $good->pivot->quantity;
        }
        return $total;
    }

    protected function createdTimeStamp(){
        if ($this->created_at){
            return \DateTime::createFromFormat('Y-m-d H:i:s', $this->created_at)->getTimestamp();
        }
        return false;
    }

    public function getDate(){
        if ($this->createdTimeStamp()){
            return date('d.m.Y', $this->createdTimeStamp());
        }
    }

    public function getTime(){
        if ($this->createdTimeStamp()){
            return date('H:i', $this->createdTimeStamp());
        }
    }
}
