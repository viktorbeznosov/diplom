<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name',
        'good_id'
    ];

    public function good(){
        return $this->belongsTo('\App\Good');
    }
}
