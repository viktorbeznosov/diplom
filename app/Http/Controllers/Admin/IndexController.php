<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function show(){
//        return view('admin.index');
        return redirect()->route('admin.order.all');
    }
}
