<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Good extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'old_price',
        'hot_new_sale',
        'active'
    ];

    public function images(){
        return$this->hasMany('\App\Image');
    }

    public function category(){
        return $this->belongsTo('\App\Category','category_id', 'id');
    }

    public function orders(){
//        return $this->belongsToMany('App\Order', 'order_good','good_id','order_id');
        return $this->belongsToMany('App\Order');
    }

    public static function getNewGoods(){
        return self::orderBy('created_at', 'desc')->limit(16)->get();
    }

    public static function getPopularGoods($count){
        $maxId = intval(self::max('id'));
        $goods = array();
        for($i = 0; $i < $count; $i++){
            $good = self::find(rand(1,$maxId));
            if (isset($good)){
                $goods[] = $good;
            }
        }

        return $goods;
    }

    public function getBageSrc(){
        if ($this->hot_new_sale == 'new'){
            return '/storage/images/blue_new.png';
        } elseif ($this->hot_new_sale == 'hot') {
            return '/storage/images/yellow_hot.png';
        } elseif ($this->hot_new_sale == 'sale'){
            return '/storage/images/red_sale.png';
        } else {
            return '/storage/images/empty_badge.png';
        }

    }
}
