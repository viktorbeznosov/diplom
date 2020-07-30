<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Good;

class IndexController extends Controller
{

    public function show(){
        $newGoods = Good::getNewGoods();
        $popularGoods = Good::getPopularGoods(8);

        $data = array(
            'newGoods' => $newGoods,
            'popularGoods' => $popularGoods
        );

        return view('public.index', $data);
    }
}
