<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockIn;

class RestockController extends Controller
{
    public function index() {

        $restockProducts = StockIn::all();
        
        $data = compact('restockProducts');
        return view('components.admin.stockin.index', $data);
    }
}
