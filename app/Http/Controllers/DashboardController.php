<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orders;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get order stats
        $totalOrders = Orders::count();
        $pending = Orders::where('status', 'pending')->count();
        $inProgress = Orders::where('status', 'inprogress')->count();
        $completed = Orders::where('status', 'done')->count();

        // Get latest 10 orders
        $recentOrders = Orders::latest()->take(10)->get();

        return view('dashboard', compact('totalOrders','pending','inProgress','completed','recentOrders'));
    }
}
