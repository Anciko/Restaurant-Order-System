<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;

class DishController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::with('category')->get();
        return view('kitchen.dish', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $dishes = Dish::with('category')->get();
        $categories = Category::all();
        return view('kitchen.dish_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|unique:dishes",
            "category_id" => "required",

        ]);
        if ($validated) {
            $dish = new Dish();
            $dish->name = $request->name;
            $dish->category_id = $request->category_id;

            $imageName = date('YmdHis') . '.' . request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'), $imageName);
            $dish->image = $imageName;
            $dish->save();
            return redirect()->route('dishes.index')->with('success', 'Dish Created successfully!');
        } else {
            return redirect()->back()->with('error', 'Validation Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $dish = Dish::find($id);
        return view('kitchen.dish_edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "required",
            "category_id" => "required"
        ]);

        if ($validated) {
            $dish = Dish::find($id);
            $dish->name = $request->name;
            $dish->category_id = $request->category_id;
            if ($request->hasFile('dish_image')) {
                $file = $request->file('dish_image');
                $imageName = uniqid() . '-' . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $imageName);
                $dish->image = $imageName;
            }

            if ($dish->update())
                return redirect()->route('dishes.index')->with('success', 'Dish updated successfully!');
            else
                return redirect()->back()->with('error', 'News updated Fail!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        $dish->delete();
        return redirect()->back();
    }

    public function order(Order $order)
    {
        $rawStatus = config('res.order_status');
        $status = array_flip($rawStatus);
        $orders = Order::whereIn('status', [1,2])->get();
        return view('kitchen.order', compact('orders', 'status'));
    }

    public function approve(Order $order)
    {
        $order->status = config('res.order_status.processing');
        $order->save();
        return redirect()->route('kitchen_order')->with('success', 'Order Approved!');
    }

    public function cancel(Order $order)
    {
        $order->status = config('res.order_status.cancel');
        $order->save();
        return redirect()->route('kitchen_order')->with('success', 'Order Rejected!');
    }
    public function ready(Order $order)
    {
        $order->status = config('res.order_status.ready');
        $order->save();
        return redirect()->route('kitchen_order')->with('success', 'Order ready!');
    }
}
