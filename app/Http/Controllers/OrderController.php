<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * 
     * @return \Illuminate\view\view
     */
    public function index()
    {
       
        $orders = Order::where(['status' => 'approved'])->where(['is_completed' => false])->get();
        
        $groupedOrders = collect($orders)
                        ->sortByDesc('created_at')
                        ->groupBy('order_number'); 

        return view('components.orders.index', compact('groupedOrders', 'orders'));
    }
    /**
     * Store a newly created order in the database.
     *
     * @param  \App\Models\Cart  $cart
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception If random_int() encounters an error generating a random number.
     */
    public function store(Cart $cart, Request $request)
    {
        $cartItems = Cart::all();

        $orderNumber = null;
        $min = 10;
        $max = 99999; 

      
        // Loop until a unique order number is generated
        do {
            try {
                $orderNumber = random_int($min, $max);
            } catch (\Exception $e) {
                // Handle the exception if random_int() encounters an error
                throw $e;
            }
        } while (Order::where('order_number', $orderNumber)->exists());
        $menuQty = Menu::all();

        foreach($cartItems as $cartItem) {
            $order = new Order;
            $order->menu          =  $cartItem->menu;
            $order->menu_id       =  $cartItem->menu_id;
            $order->order_number  =  $orderNumber;
            $order->category      =  $cartItem->category;
            $order->quantity      =  $cartItem->quantity;
            $order->price         =  $cartItem->price * $cartItem->quantity;
            $order->image         =  $cartItem->image;
            $order->status        =  'pending';
            $order->is_completed  =  false;

            // Update the menu quantity or products quantity
            $menu =  $menuQty->where('id', $cartItem->menu_id)->first();
            
            if($menu) {
                $menu->quantity -= $cartItem->quantity;

                if($menu->quantity <= 0) {
                    $menu->quantity = 0;
                    $menu->status = 2;
                }
                $menu->save();
            }

            $order->save();
        }
        //clear the cart database after saving to database
        $cart->truncate();

        Session::forget('cart');
        return redirect()->route('order.complete')->with('orderNumber', $orderNumber);
    }

    /**
     * Display the complete view
     * 
     * @return \Illuminate\View\View
     */
    public function complete()
    {
        return view('components.menu.complete');
    }
    
  /**
   * Display the kitchen view with the list of orders
   * 
   * @return \Illuminate\View\View
   */
    public function done($orderId) {

    try {
        Order::where('order_number', $orderId)
        ->update(['is_completed' => true]);

        return redirect()->route('order.index')->with('success', 'Order ready to be served');;
    } catch(\Exeption $e) {

        return redirect()->route('order.index')->with('error', $e->getMessage());
        }
    }
    
    /**
     * Process payment for one or more orders.
     *
     * @param int|array $orderIds The order ID(s) to process payment for.
     *
     * @return \Illuminate\Http\RedirectResponse Redirects to the cashier index with success or error message.
     */
    public function paid($orderId) {

        try {

            $orders = Order::where('order_number', $orderId)->get();
            $groupedOrders = collect($orders)->groupBy('order_number')->sortBy('created_at');

            $total = Order::where('order_number', $orderId)->sum('price');
       
            
            Transaction::create([
                'order_id'   =>   $orderId,
                'amount'     =>   $total,
            ]);
            
            Order::where('order_number', $orderId)->update(['status' => 'approved']);
            return redirect()->route('cashier.index')->with('success', 'order '. $orderId . ' is now serving');
        } catch(\Exception $e) {

            return redirect()->route('cashier.index')->with('error', 'An error has occurred. Please try your request again.');
        }
    }
}