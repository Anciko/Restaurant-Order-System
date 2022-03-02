<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $dishes = Dish::orderBy('id', 'desc')->get();
        $tables = Table::all();
        $rawStatus = config('res.order_status');
        $status = array_flip($rawStatus);
        $orders = Order::where('status', 4)->get();

        return view('order_form', compact('dishes', 'tables', 'orders', 'status'));
    }

    public function submit(Request $request)
    {
        $data = array_filter($request->except('_token','table'));

        $orderId = rand();

        foreach ($data as $key => $value) {
            if ($value > 1) {
                for ($i = 0; $i < $value; $i++) {
                    $this->saveOrder($orderId, $key, $request);
                }
            } else {
                $this->saveOrder($orderId, $key, $request);
            }
        }
        return redirect()->route('kitchen_order')->with('success', 'Order submitted!');
    }

    public function saveOrder($orderId, $key, $request)
    {
        $order = new Order();
        $order->order_id = $orderId;
        $order->dish_id = $key;
        $order->table_id = $request->table;
        $order->status = config('res.order_status.new');

        $order->save();
    }


    public function serve(Order $order) {
        $order->status = config('res.order_status.done');
        $order->save();
        return redirect()->back()->with('success', 'Order Serve to Customer');
    }

}
