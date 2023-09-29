<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Stock;

class DashboardController extends Controller
{
    

    public function index() {

        $menus = Menu::all();
        $stocks = Stock::count();

        return view('components.admin.dashboard.index', compact('menus', 'stocks'));
    }
}
