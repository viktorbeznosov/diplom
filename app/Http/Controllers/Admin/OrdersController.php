<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Good;
use App\Image;
use App\Category;
use App\Order;
use App\OrderStatus;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function orders(){
        $orders = Order::orderBy('created_at', 'desc')->get();
        $statuses = OrderStatus::get();

        $data = array(
            'orders' => $orders,
            'statuses' => $statuses
        );

        return view('admin.orders', $data);
    }

    public function order($order_id = false){
        $order = Order::find($order_id);
        if (!$order){
            abort(404);
        }
        $data = array(
            'order' => $order
        );
        return view('admin.order', $data);
    }

    public function orderGoodDelete($order_good_id = false){
        $order_good = DB::table('order_good')->find($order_good_id);
        $order_id = $order_good->order_id;

        DB::table('order_good')->where('id','=',$order_good_id)->delete();

        return redirect()->route('admin.order.show', $order_id)->with(['message' => 'Товар удален']);
    }

    public function orderDelete($order_id){
        $order = Order::find($order_id);
        $order->delete();

        return redirect()->route('admin.order.all')->with(['message' => 'Заказ удален']);
    }

    public function orderUpdate(Request $request, $order_id){
        print_r(array(
           'request' => $request->all(),
            'order_id' => $order_id,
        ));
    }

    public function ajaxOrderChangeStatus(Request $request){
        $status = OrderStatus::find($request->get('status_id'));
        $statuses = OrderStatus::where('id','<>',$status->id)->get();

        $order = Order::find($request->get('order_id'));
        $order->status_id = $request->get('status_id');
        $order->save();

        $response = array(
            'status' => array(
                'id' => $status->id,
                'name' => $status->name,
                'color' => $status->color
            )
        );
        foreach ($statuses as $item){
            $response['statuses'][] = array(
                'id' => $item->id,
                'order_id' => $request->get('order_id'),
                'name' => $item->name,
                'color' => $item->color
            );
        }

        print_r(json_encode($response));
    }
}
