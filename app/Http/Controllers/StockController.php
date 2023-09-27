<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::paginate(10);
        return view('components.admin.stocks.index', compact('stocks'));
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
        // dd($request);
        $validate = $request->validate([
            'item' => 'required',
            'manufacturer' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'cost' => 'required'
        ]);
        Stock::create($validate);
        return redirect()->route('stocks.index')->with('success', 'Item has been added');
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
        $validate = $request->validate([
            'item' => 'required',
            'description' => 'required',
            'manufacturer' => 'required',
            'quantity' => 'required',
            'cost' => 'required'
        ]);
        $stock->update($validate);
        return redirect()->route('stocks.index')->with('info', 'Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('danger', 'Item has been deleted');
    }
}
