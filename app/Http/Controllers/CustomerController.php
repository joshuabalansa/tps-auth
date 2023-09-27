<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
class CustomerController extends Controller
{
    public $categories = [];

    public function index() {

        $cart_items_count = Cart::count();
        $menus = Menu::where('status', 1)->get();
        $categories = Category::all();

       $menus->isEmpty() ? $isEmpty = true : $isEmpty = false;
       
        return view('components.menu.menu', [
            'menus' => $menus,
            'isEmpty' => $isEmpty,
            'categories' => $categories,
            'cart_items_count' => $cart_items_count
        ]);
        
    }

    public function selectedCategory(string $categoryId) {
        $cart_items_count = Cart::count();

        $cart_items = Cart::all();
        $menus = ($categoryId === 0) ? Menu::all() : Menu::where('category', $categoryId)->where('status', 1)->get();
        $categories = Category::all();
        
        $menus->isEmpty() ? $isEmpty = true : $isEmpty = false;

        return view('components.menu.menu', [
            'menus' => $menus,
                'isEmpty' => $isEmpty,
                'categories' => $categories,
                'cart_items' => $cart_items,
                'cart_items_count' => $cart_items_count
            ]);
    }
}