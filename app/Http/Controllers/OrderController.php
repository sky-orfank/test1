<?php

namespace App\Http\Controllers;

use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders()
    {
    	$orders = \App\Order::paginate(15);
        return view('orders', ['orders' => $orders]);
    }

    public function editOrder($id)
    {
    	$order = \App\Order::find($id);
    	return view('order', ['order' => $order]);
    }

    public function saveOrder($id, Request $request)
    {
    	$order = \App\Order::find($id);
    	$order->client_email = $request->email;
    	$order->status = $request->status;
		\App\Partner::where('id', $order->partner_id)
          ->update(['name' => $request->partner_name]);
    	$order->save();
    	return \Redirect::away('/order/'.$order->id);
    }

}

