<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::whereYear('created_at', session('exercise'));
        $sales = Sale::whereYear('created_at', session('exercise'));
        return view('home')
            ->with('orders', $orders)
            ->with('sales', $sales);
    }
}
