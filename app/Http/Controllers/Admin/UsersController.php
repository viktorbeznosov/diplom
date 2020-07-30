<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function users(){
        $users = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_id','<>',1)
            ->select('users.*')
            ->get();
        $data = array(
            'users' => $users
        );

        return view('admin.users', $data);
    }

    public function user($user_id = false){
        $user = User::find($user_id);
        $data = array(
            'user_id' => $user_id,
            'user' => $user
        );

        return view('admin.user', $data);
    }

    public function userUpdate($user_id, Request $request){
        $user = User::find($user_id);
        $user->name = $request->get('user_name');
        $user->email = $request->get('user_email');
        $user->phone = $request->get('user_phone');
        $user->state = $request->get('user_state');
        $user->street = $request->get('user_street');
        $user->house = $request->get('user_house');
        $user->flat = $request->get('user_flat');

        $user->save();

        return redirect()->route('admin.user.show', $user->id)->with(['message' => 'Данные пользователя были изменены']);
    }

    public function userDelete($user_id){
        DB::table('role_user')->where('user_id', '=', $user_id)->delete();
        $orders = Order::where('user_id','=', $user_id)->get();
        foreach ($orders as $order){
            DB::table('order_good')->where('order_id','=', $order->id)->delete();
            $order->delete();
        }
        $user = User::find($user_id);
        $user->delete();

        return redirect()->route('admin.user.all')->with(['message' => 'Пользоывтель удален']);
    }
}
