<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'state',
        'street',
        'house',
        'flat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role', 'role_user','user_id','role_id');
    }

    public function isAdmin(){
        return $this->hasRole('admin');
    }

    public function hasRole($roleName){
        return $this->roles()->where('name','=',$roleName)->count() == 1;
    }

    public function makeBuyer(){
        $this->roles()->attach(2);
    }

    public function orders(){
        return $this->hasMany('App\Order','user_id','id');
    }

    public function getTotalPrice(){
        $total = 0;
        foreach ($this->orders()->get() as $order){
            $total += $order->getTotalPrice();
        }
        return $total;
    }
}
