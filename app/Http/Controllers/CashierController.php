<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

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
        try {
            Order::where(['order_number' => $orderId])->update(['status' => 'cancelled']);
            return redirect()->route('cashier.index')->with('success', 'Order ' . $orderId . ' has been cancelled');
        } catch(\Exception $e) {
            
            return redirect()->route('cashier.index')->with('error', 'Something went wrong, try again');
        }
    }

    
    /**
     * view details of orders
     *
     * @param int $orderNumber
     * @return void
     */
    public function details($orderNumber) {

        $orderDetails = Order::where('order_number', $orderNumber)->get();
        $totalPrice = $orderDetails->sum('price');
        $carbonTimestamp = Carbon::parse($orderDetails[0]['created_at']); // Assuming there is at least one order detail
        $createdTime = $carbonTimestamp->diffForHumans();
    
        return view('components.cashier.details', compact('orderDetails','orderNumber', 'totalPrice', 'createdTime'));
    }
}
