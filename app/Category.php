<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function goods(){
        return $this->hasMany('\App\Good');
    }

    public function images(){
        return $this->hasManyThrough('\App\Image','\App\Good');
    }
}
