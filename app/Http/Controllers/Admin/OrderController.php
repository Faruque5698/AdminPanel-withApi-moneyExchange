<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                "LoggedUserInfo" => $user
            ];

//             $services= Service::where("status","=",1)->get();


            $orders = Order::all();

//            return $orders;



            return view("Admin.AdminPanel.orders.orders",[
                'orders' => $orders
            ],$data);
        }
    }

    public function add(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                "LoggedUserInfo" => $user
            ];

            $services= Service::where("status","=",1)->get();

//                return $services;
//
            return view("Admin.AdminPanel.orders.add_orders",[
                'services' => $services
            ],$data);
        }
    }

    public function save(Request $request){
//        $request->validate([
//            'send' => 'required',
//            'send_money' => 'required',
//            'receive' => 'required',
//            'receive_money' => 'required',
//            'delivery_status' => 'required'
//        ]);
//
//        $order_id = uniqid("ORD-");
//
//        $orders = new Order();
//        $orders->customer_id = auth()->user()->id;
//        $orders->order_id = $order_id;
//        $orders->send = $request->send;
//        $orders->send_money = $request->send_money;
//        $orders->receive = $request->receive;
//        $orders->receive_money = $request->receive_money;
//        $orders->delivery_status = $request->delivery_status;
//        $orders->status = $request->status;
//
//        $orders->save();
//
//        return back()->with('message','Order Placed Successfully');



    }

    public function published($id){
        $order = Order::find($id);
        $order->status = 1;
        $order->save();

        return back()->with('message','Service saved Successfully');
    }public function unpublished($id){
        $order = Order::find($id);
        $order->status = 0;
        $order->save();

        return back()->with('message','Service saved Successfully');
    }

    public function delivery_status($id){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                "LoggedUserInfo" => $user
            ];

            $order = Order::find($id);

//                return $services;
//
            return view("Admin.AdminPanel.orders.publication_status",[
                'order' => $order
            ],$data);
        }



    }

    public function publication_status_changed(Request $request){
        $order = Order::find($request->id);
        $order->delivery_status = $request->delivery_status;
        $order->save();

        return redirect('orders');

    }

    public function delete($id){
        $order = Order::find($id);
        $order->delete();
        return back();
    }

    public function  data(Request $request){
//        $order_id = $request
    }
}
