<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return view
     */
    public function index()
    {

        $menus = Menu::all();
        $categories = Category::all();
        $availableCount = Menu::where('status', 1)->count();
        $draftCount = Menu::where('status', 0)->count();
        return view('components.admin.menu.index', compact('menus', 'categories', 'availableCount', 'draftCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('components.admin.menu.create', compact('categories'));
    }

    /**
     * Store a newly created resource in menu.
     * 
     * @param array request
     * @return view
     */
    public function store(Request $request)
{
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'description' => 'required',
            'category' => 'required',
            'price' => ['required', 'numeric'],
            'status' => '',
            'image' => [
                'nullable',
                'image', 
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $validatedData['image'] = $imageName;
        } else {
            $validatedData['image'] = null;
        }
            // getting user input request and storing to database 
            $menu = new Menu;
            
            $menu->name = $validatedData['name'];
            $menu->description = $validatedData['description'];
            $menu->category = $validatedData['category'];
            $menu->price = $validatedData['price'];
            $menu->status = $validatedData['status'];
            $menu->image = $validatedData['image'];
            $menu->save();   

            return redirect()->route('menu.index')->with('success', 'Item added successfully!');
}


    /**
     * Show the form for editing the specified resource.
     * @param array menu
     * @return array menu list
     * 
     */
    public function edit(Menu $menu)
    {
        $selectedCategory = $menu->category;
        $categories = Category::all();
        return view('components.admin.menu.edit', compact('menu', 'selectedCategory', 'categories'));
    }

    /**
     * Update the specified resource in menu.
     * @param array
     * @return array view
     */
    public function update(Request $request, Menu $menu)
    {
        
        $validate = $request->validate([
            'name' => 'required:min:2',
            'description' => 'required',
            'category' => 'required',
            'price' => ['required', 'numeric'],
            'status' => ''
        ]);
        
        $menu->update($validate);
        return redirect()->route('menu.index')->with('info', $menu->name . ' Has beed updated');
    }

    /**
     * Remove the specified resource from menu.
     * 
     * @param array
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('danger', 'Item has been deleted!');
    }
}