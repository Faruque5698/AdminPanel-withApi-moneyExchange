<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request){
        $order_id = uniqid("ORD-");

        $request->validate([
            "send" => "required",
            "send_money" => "required",
            "receive" => "required",
            "receive_money" => "required"

        ]);

        $order = new Order();

        $order->customer_id = auth()->user()->id;
        $order->order_id = $order_id;
        $order->send = $request->send;
        $order->send_money = $request->send_money;
        $order->receive = $request->receive;
        $order->receive_money = $request->receive_money;
        $order->delivery_status = $request->delivery_status;
        $order->status = $request->status;

        $order->save();

        return response()->json([
            "status" => true,
            "message" => "Order successful"
        ]);

    }

    public function all_orders(){
        $customer_id = auth()->user()->id;

        $orders = Order::where('customer_id','=',$customer_id)->get();

//        $orders = Order::all();
        return response()->json([
            "status" => 1,
            "message" => "All Orders",
            "data" => $orders
        ]);
    }
    public function single_order(Request $request){

        $order_id = $request->order_id;
        $customer_id = auth()->user()->id;

        if (Order::where([
            "customer_id" => $customer_id,
            "order_id" => $order_id
        ])->exists()){

            $order = Order::where('order_id','=',$order_id)->get();

            return response()->json([
                "status" => 1,
                "message" => "Order Data Found",
                "book data" => $order
            ]);

        }else{
            return response()->json([
                "status" => 0,
                "message" => "Order Data Not Found"
            ]);
        }

    }

}
