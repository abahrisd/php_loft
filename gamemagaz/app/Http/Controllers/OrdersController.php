<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        $data['orders'] = Order::with('product')->get();
        return view('admin.orders.index', $data);
    }
}
