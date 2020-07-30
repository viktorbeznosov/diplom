<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DestinationType;
use App\Order;
use App\Good;

class OrderController extends Controller
{
    public function show(Request $request){
        $destinations = DestinationType::get();
        $data = array(
            'destinations' => $destinations
        );
        return view('public.checkout', $data);
    }

    public function confirm(Request $request){
        $cart = json_decode($request->get('cart'));
//        dump($cart->items);die();

        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->state = $request->get('state');
        $order->street = $request->get('street');
        $order->house = $request->get('house');
        $order->flat = $request->get('flat');
        $order->comment = $request->get('comment');
        $order->destination_type_id = $request->get('dest');
        $order->status_id = 1;
        $order->save();

        foreach ($cart->items as $item){
            $good = Good::find($item->id);
            $order->goods()->attach($good, array('quantity' => $item->quantity));
        }

//        return view('public.order_done');
        return redirect()->route('order.done', $order->id);
    }

    public function done($order_id){
        $data = array(
            'order_id' => $order_id
        );
        return view('public.order_done', $data);
    }

    public function info(Request $request){
        $cart = json_decode($request->get('cart'));
        $destination = DestinationType::find($request->get('dest'));

        $data = array(
            'order' => array(
                'cart' => $cart,
                'cart_json' => $request->get('cart'),
                'state' => $request->get('state'),
                'street' => $request->get('street'),
                'house' => $request->get('house'),
                'flat' => $request->get('flat'),
                'dest' => $destination,
                'comment' => $request->get('comment')
            ),
            'user' => Auth::user()
        );

        return view('public.checkout', $data);
//        return redirect()->route('order')->with($data);
    }
}
