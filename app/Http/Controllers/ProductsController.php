<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Good;

class ProductsController extends Controller
{
    public function category($category_id = false){
        if (!$category_id){
            abort(404);
        }
        $category = Category::find($category_id);
        $goods = $category->goods()->paginate(17);

        $data = array(
            'category_id' => $category_id,
            'category' => $category,
            'goods' => $goods,
        );
        return view('public.category', $data);
    }

    public function product($product_id = false){
        if (!$product_id){
            abort(404);
        }
        $popularGoods = Good::getPopularGoods(8);
        $good = Good::find($product_id);
        $cat_id = $good->category_id;
        $data = array(
            'good' => $good,
            'category_id' => $cat_id,
            'popularGoods' => $popularGoods
        );

        return view('public.product', $data);
    }
}
