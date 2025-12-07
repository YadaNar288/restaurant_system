<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Dishes;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Orders::latest()->paginate(10);
        return view('kitchen.order_list', compact('orders')); // <- separate view
    }

    // Show form to create a new order
    public function create()
    {
        $dishes = Dishes::all(); // dishes for selection
        return view('kitchen.order_form', compact('dishes'));
    }

    // Store a new order
    public function store(Request $request)
    {
        $request->validate([
            'table_number' => 'required',
            'items' => 'required|array',
            'status' => 'required|in:pending,in_progress,done',
        ]);

        Orders::create([
            'table_number' => $request->table_number,
            'items' => $request->items,
            'status' => $request->status,
        ]);

        return redirect()->route('kitchen.orders')->with('success', 'Order created successfully!');
    }

    // Show form to edit an order
    public function edit(Orders $order)
    {
        $dishes = Dishes::all(); // dishes for selection
        return view('kitchen.order_form', compact('order', 'dishes'));
    }

    // Update an order
    public function update(Request $request, Orders $order)
    {
        $request->validate([
            'table_number' => 'required',
            'items' => 'required|array',
            'status' => 'required|in:pending,in_progress,done',
        ]);

        $order->update([
            'table_number' => $request->table_number,
            'items' => $request->items,
            'status' => $request->status,
        ]);

        return redirect()->route('kitchen.orders')->with('success', 'Order updated successfully!');
    }

    // Delete an order
    public function destroy(Orders $order)
    {
        $order->delete();
        return redirect()->route('kitchen.orders')->with('success', 'Order deleted successfully!');
    }
}
