<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::where(['status' => 'pending'])->get();
        $groupedOrders = collect($orders)->groupBy('order_number')->sortBy('created_at');
        
        return view('components.cashier.index', compact('orders', 'groupedOrders')); 
    }

    /**
     * cancel the order 
     * @param int $orderId
     * @return \Illuminate\View\View;
     */
    public function cancel($orderId)
    {
        Order::where(['order_number' => $orderId])
             ->update(['status' => 'cancelled']);
        return redirect()->route('cashier.index')->with('warning', 'Order ' . $orderId . ' has been cancelled');
    }
}
