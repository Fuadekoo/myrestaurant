<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view("management.category")->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("management.categoryCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        session()->flash('status', 'Category created successfully');
        return redirect('/management/category');
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
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view("management.categoryEdit")->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id
        ]);
        // Find the category by ID
    $category = Category::find($id);

    // Check if the category exists
    if (!$category) {
        return redirect('/management/category')->withErrors(['Category not found.']);
    }
        $category->name = $request->name;
        $category->save();
        session()->flash('status', 'Category updated successfully');
        return redirect('/management/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
        }
        session()->flash('status', 'Category deleted successfully');
        return redirect('/management/category');
    }
}
