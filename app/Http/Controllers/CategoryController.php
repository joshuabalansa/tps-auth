<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Menu;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all()->sortByDesc('created_at');

        $categoryMenus = [];

        foreach ($categories as $data) {
            $menus = Menu::where('category', $data->category_id)->get();
            $categoryMenus[$data->category_id] = $menus;
        }
        
        return view('components.admin.category.index', compact('categories', 'categoryMenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => '',
            'category' => 'required|min:3',
        ]);
        $category = new Category;
        $category->category_id = $validatedData['category_id'];
        $category->category = $validatedData['category'];
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category has been');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        $categoryMenus = [];

        foreach ($categories as $data) {
            $menus = Menu::where('category', $data->category_id)->get();
            $categoryMenus[$data->category_id] = $menus;
        }
        return view('components.admin.category.edit', compact('category', 'categories', 'categoryMenus'));
    }

    /**
     * Update the specified resource in storage.
     * @param array
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'category' => 'required|min:3',
        ]);
        $category->update($validatedData);

        return redirect()->route('category.index')->with('success', 'Category has been');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('danger', 'Category has been deleted');
    }
}
