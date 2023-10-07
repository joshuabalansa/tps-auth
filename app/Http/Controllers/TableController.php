<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::take(10)->get();
        return view('components.admin.table.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Illuminate\View\View
     */
    public function create()
    {

        return view('components.admin.table.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'table_name' => 'required',
                'status'     => 'required'
            ]);

            Table::create($validatedData);
            return redirect()->route('table.index')->with('success', 'New table has been created');

        } catch(\Exception $e) {
            
            return redirect()->route('table.index')->with('danger', 'Opps! Something went wrong');
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
     * @return \Illuminate\View\View
     */
    public function edit(Table $table)
    {
        $tables = Table::take(10)->get();
        return view('components.admin.table.edit', compact('table', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
         try {

            $validatedData = $request->validate([
                'table_name' => 'required',
                'status'     => 'required'
            ]);

            $table->update($validatedData);
            return redirect()->route('table.index')->with('info', 'Table has been updated');

        } catch(\Exception $e) {
            
            return redirect()->route('table.index')->with('danger', 'Opps! Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {

        try {
            $table->delete();
            return redirect()->route('table.index')->with('success', 'Table ' . $table->getTableName() . ' Has been deleted');
        
        } catch (\Exception $e) {  
            return redirect()->route('table.index')->with('danger', 'Opps! Something went wrong, Try again');
        }
    }
}
