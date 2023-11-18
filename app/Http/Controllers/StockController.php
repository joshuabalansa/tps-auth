<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Menu;
use App\Models\Category;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $stocks = Stock::paginate(10);
        // $stocksCount = Stock::count();
        // return view('components.admin.stocks.index', compact('stocks', 'stocksCount'));
        $menus = Menu::all();
        $categories = Category::all();
        $availableCount = Menu::where('status', 1)->count();
        $draftCount = Menu::where('status', 0)->count();
        $outOfStocks = Menu::where('status', 2)->count();
        $availableStocks = Menu::where('status', 1)->count();

        $productQtyMin = $menus->min('quantity');
        $productLowQty = $menus->where('quantity', $productQtyMin)->first();

        $productQtyMax = $menus->max('quantity');
        $productHighQty = $menus->where('quantity', $productQtyMax)->first();

        return view('components.admin.stocks.index', 
            compact('menus', 
            'categories', 
            'availableCount', 
            'draftCount', 
            'productQtyMin', 
            'productQtyMax', 
            'productLowQty',
            'productHighQty',
            'outOfStocks',
            'availableStocks'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.admin.stocks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'item' => 'required',
                'manufacturer' => 'required',
                'description' => 'required',
                'quantity' => 'required',
                'cost' => 'required',
            ]);
            Stock::create($validate);
            return redirect()
                ->route('stocks.index')
                ->with('success', 'Item has been added');
        } catch (\Exception $e) {
            return redirect()
                ->route('stocks.index')
                ->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        return view('components.admin.stocks.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Stock $stock, Request $request)
    {
        try {
            $validate = $request->validate([
                'item' => 'required',
                'description' => 'required',
                'manufacturer' => 'required',
                'quantity' => 'required',
                'cost' => 'required',
            ]);
            $stock->update($validate);
            return redirect()
                ->route('stocks.index')
                ->with('info', 'Item has been updated');
        } catch (\Exception $e) {
            return redirect()
                ->route('stocks.index')
                ->with('error', 'Opps! Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        try {
            $stock->delete();
            return redirect()
                ->route('stocks.index')
                ->with('danger', 'Item has been deleted');
        } catch (\Exception $e) {
            return redirect()
                ->route('stocks.index')
                ->with('error', 'Opps! Something went wrong');
        }
    }
}
