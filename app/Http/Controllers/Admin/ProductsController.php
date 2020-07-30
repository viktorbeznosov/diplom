<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Good;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ProductsController extends Controller
{
    public function categories(){
        $categories = Category::all();
        $data = array(
            'categories' => $categories
        );

        return view('admin.categories', $data);
    }

    public function category($category_id = false){
        $category = Category::find($category_id);
        $goods = $category->goods()->get();
         if ($category){
            $data = array(
                'category' => $category,
                'goods' => $goods
            );

            return view('admin.category', $data);
        }

    }

    public function categoryAdd(Request $request){
        if ($request->isMethod('post')){
            $messages = array();
            $validator = Validator::make($request->all(), array(
                'category_name' => 'required',
            ), $messages);

            if($validator->fails()){
                return redirect()->route('admin.category.all')->withErrors($validator)->withInput();
            } else {
                $category = new Category();
                $category->name = $request['category_name'];
                $category->save();
            }

            return redirect()->route('admin.category.all')->with(['message' => 'Категория добавлена']);
        }

    }

    public function categoryDelete($categoty_id){
        $category = Category::find($categoty_id);
        if ($category){
            $images = $category->images()->get();
            foreach ($images as $image){
                if (file_exists(public_path($image->name))){
                    unlink(public_path($image->name));
                }
                $image->delete();
            }
            $goods = $category->goods()->get();
            if (count($goods) > 0){
                foreach ($goods as $good){
                    $good->delete();
                }
            }

            if ($category){
                $category->delete();
            }
        }

        return redirect()->route('admin.category.all')->with(['message' => 'Категория удалена']);
    }

    public function categoryUpdate($categoty_id, Request $request){
        $category = Category::find($categoty_id);
        $goods = $category->goods()->get();

        if ($category){
            $category->name = $request['category_name'];
            $category->save();
        }

        return redirect()->route('admin.category.show', $category->id)->with(['message' => 'Категория переименована']);

    }

    public function product($product_id = false){
        $good = $product_id ? Good::find($product_id) : false;
        $data = array(
            'good' => $good,
            'action' => $product_id ? 'show' : 'add'
        );

        return view('admin.product', $data);
    }

    public function productUpdate($product_id, Request $request){
        $good = Good::find($product_id);
        $good->name = $request->get('product_name');
        $good->description = $request->get('product_description');
        $good->price = $request->get('product_price');
        $good->old_price = $request->get('product_old_price');

        if($request->get('hot_new_sale') != "0"){
            $good->hot_new_sale = $request->get('hot_new_sale');
        } else {
            $good->hot_new_sale = NULL;
        }
        $good->save();

        $imgesIncomeIds = explode(',', $request->get('images_ids'));
        foreach ($request->file() as $key => $file){
            $image = Image::find($key);
            if ($image){
                $fileName = $good->id . '_' . time() . '_' . random_int(1000, 9999) . '.' . $file->getClientOriginalExtension();
                if (file_exists(public_path($image->name))){
                    unlink(public_path($image->name));
                }

                $newImageName = 'storage/images/uploads/goods/'. $fileName;
                $image->name = $newImageName;
                $image->save();
                $file->move('storage/images/uploads/goods/', $fileName);
            } else {
                $fileName = $good->id . '_' . time() . '_' . random_int(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move('storage/images/uploads/goods/', $fileName);
                $imageName = 'storage/images/uploads/goods/'. $fileName;
                $image = new Image();
                $image->name = $imageName;
                $image->good_id = $good->id;
                $image->save();
                $imgesIncomeIds[] = $image->id;
            }

        }

        $images = $good->images()->get();
        foreach ($images as $img) {
            if(!in_array($img->id, $imgesIncomeIds)){
                if (file_exists(public_path($img->name))){
                    unlink(public_path($img->name));
                }
                $img->delete();
            }
        }

//        return view('admin.product', $data);
        return redirect()->route('admin.product.show', $good->id)->with(['message' => 'Товар сохранен']);
    }

    public function productAdd(Request $request, $category_id = false){
        if ($request->isMethod('get')){
            $data = array(
                'good' => false,
                'action' => 'add',
                'category_id' => $category_id
            );
            return view('admin.product', $data);
        } else {

            $good = new Good();
            $good->category_id = $request->get('product_category_id');
            $good->name = $request->get('product_name');
            $good->description = $request->get('product_description');
            $good->price = $request->get('product_price');
            $good->old_price = $request->get('product_old_price');
            if ($request->get('hot_new_sale') != "0"){
                $good->hot_new_sale = $request->get('hot_new_sale');
            }

            $good->save();

            foreach ($request->file() as $file) {
                $fileName = $good->id . '_' . time() . '_' . random_int(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move('storage/images/uploads/goods/', $fileName);
                $imageName = 'storage/images/uploads/goods/'. $fileName;
                $image = new Image();
                $image->name = $imageName;
                $image->good_id = $good->id;
                $image->save();
            }

            $data = array(
                'good' => $good,
                'action' => 'show'
            );

            return redirect()->route('admin.category.show', $good->category_id);
        }

    }

    public function productDelete($product_id){
        $good = Good::find($product_id);
        $images = $good->images()->get();
        foreach ($images as $image){
            if (file_exists(public_path($image->name))){
                unlink(public_path($image->name));
            }
            $image->delete();
        }
        $category_id = $good->category_id;
        $good->delete();

        return redirect()->route('admin.category.show', $category_id);
    }
}
