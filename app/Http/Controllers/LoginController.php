<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show(){
        return view('public.login');
    }

    public function account(){
        $user = Auth::user();
        $orders = Order::where('user_id','=',$user->id)->get();
        $data = array(
            'user' => $user,
            'orders' => $orders
        );
        return view('public.account', $data);
    }

    public function updateUser(Request $request){
        $user = User::find($request->user()->id);
        $user->name = $request->get('user_name');
        $user->email = $request->get('user_email');
        $user->phone = $request->get('user_phone');
        $user->state = $request->get('user_state');
        $user->street = $request->get('user_street');
        $user->house = $request->get('user_house');
        $user->flat = $request->get('user_flat');
        if ($request->get('user_password')){
            $user->password = bcrypt($request->get('user_password'));
        }

        $user->save();
        $data = array(
            'message' => 'Ваши данные были изменены'
        );

//        return view('public.account', $data);
        return redirect()->route('account')->with(['message' => 'Ваши данные были изменены']);
    }
}
