<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orders;
use Illuminate\Http\Request;

class KitchenDashboardController extends Controller
{
    public function index()
    {
        $total = Orders::count();
        $pending = Orders::where('status','pending')->count();
        $inProgress = Orders::where('status','in_progress')->count();
        $completed = Orders::where('status','done')->count();

        $orders = Orders::latest()->take(10)->get(); // latest 10 orders

        return view('kitchen.dashboard', compact(
            'total','pending','inProgress','completed','orders'
        ));
    }
}
