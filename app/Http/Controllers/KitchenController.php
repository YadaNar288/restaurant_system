<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\Orders;
use App\Models\Categories;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    // Dashboard overview
    public function dashboard()
    {
        $total = Orders::count();
        $pending = Orders::where('status', 'pending')->count();
        $inProgress = Orders::where('status', 'in_progress')->count();
        $completed = Orders::where('status', 'done')->count();

        $orders = Orders::latest()->take(10)->get(); // recent 10 orders

        return view('kitchen.dashboard', compact(
            'total', 'pending', 'inProgress', 'completed', 'orders'
        ));
    }

    // List all dishes
   public function dishes(Request $request)
{
    // Load categories for sidebar
    $categories = Categories::all();

    // Base query
    $query = Dishes::query();

    // Category filter
    if ($request->has('category') && $request->category !== '') {
        $query->where('categories_id', $request->category);
    }

    $dishes = $query->get();

    return view('kitchen.dishes', compact('dishes', 'categories'));
}


    // List all orders
    public function orders(Request $request)
    {
        $query = Orders::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->paginate(15); // paginate orders
        return view('kitchen.orders', compact('orders'));
    }

    // Stats page
    public function stats()
{
    $categories = \App\Models\Categories::all(); // sidebar categories

    $stats = [
        'total' => Orders::count(),
        'pending' => Orders::where('status', 'pending')->count(),
        'in_progress' => Orders::where('status', 'in_progress')->count(),
        'done' => Orders::where('status', 'done')->count(),
    ];

    return view('kitchen.stats', compact('stats', 'categories'));
}

public function settings()
{
    $categories = \App\Models\Categories::all(); // sidebar categories

    return view('kitchen.settings', compact('categories'));
}
}
