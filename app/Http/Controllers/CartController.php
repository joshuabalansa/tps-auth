<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return array
     */
    public function index()
    {
        
        $cart = session()->get('cart', []);

       return view('components.menu.cart', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param array
     */
    public function store(Menu $menu, Request $request)
    {
        try {
            $category = $menu->getCategory()->pluck('category')->first();

            $cart = new Cart;
            $cart->menu_id = $menu->id;
            $cart->menu =  $menu->getName();
            $cart->category =  $category;
            $cart->image =  $menu->image;
            $cart->quantity = $request->qty;
            $cart->price = $menu->getPrice();
            $cart->save();
        
            // Add cart item to session
            $cartItem = [
                'menu_id' => $cart->menu_id,
                'menu' => $cart->menu,
                'category' => $cart->category,
                'image' => $cart->image,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
            ];
        
            $cartSession = Session::get('cart', []);
            $cartSession[] = $cartItem;
            Session::put('cart', $cartSession);
        
            return redirect()->route('cart.index')->with('success', 'Menu has been Added');
        } catch(\Exception $e) {
            
            return redirect()->route('cart.index')->with('error', 'Opps! Something went wrong');
        }
        
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\View\View with passed array of $menu
     */
    public function show(Menu $menu)
    {

        return view('components.menu.detail', compact('menu'));
    }

    /**
     * Remove the specified resource from storage and session
     * 
     * @param int
     * 
     */
    public function destroy($menuId) {
    
        try {
        
            $cartSession = Session::get('cart', []);
            $deleted = Cart::where(['menu_id' => $menuId])->delete();

            // if ($deleted > 0) {
            //     return redirect()->route('cart.index')->with('success', 'Product Deleted Successfully!');
            // }
    

            // Find and remove the item from the cart session
            $indexToDelete = -1;
            foreach ($cartSession as $index => $cartItem) {
                if ($cartItem['menu_id'] == $menuId) {
                    $indexToDelete = $index;
                    break;
                }
            }

            // If the item was found in the cart session, remove it
            if ($indexToDelete !== -1) {
                unset($cartSession[$indexToDelete]);
                $cartSession = array_values($cartSession); // Reset array keys
                Session::put('cart', $cartSession); // Update the cart session
            }

            // If the cart is empty, redirect to customer index; otherwise, go back to the cart
            return empty($cartSession) ? redirect()->route('customer.index') : redirect()->route('cart.index');
        
        } catch (Exception $e) {
            
            // Log the exception message for debugging
            Log::error($e);

            return redirect()->route('cart.index')->with('error', 'Oops! Something went wrong');
        }
    }
}