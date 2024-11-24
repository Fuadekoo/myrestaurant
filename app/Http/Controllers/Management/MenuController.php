<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::paginate(5);
        return view("management.menu")->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view("management.menuCreate")->with("categories", $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|Mimes:jpeg,png,jpg,gif,svg|max:5000',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        $imageNames = date('YmdHis').uniqid().'.'.$request->image->extension();
        $request->image->move(public_path('menu_images'), $imageNames);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->image = $imageNames;
        $menu->description = $request->description;
        $menu->category_id = $request->category_id;
        $menu->save();
        session()->flash('status', $request->name. 'is saved successfully');
        return redirect('/management/menu');
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
        $menu = Menu::find($id);
        $categories = Category::all();
        return view("management.menuEdit")->with('menu', $menu)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|Mimes:jpeg,png,jpg,gif,svg|max:5000',
            'category_id' => 'required'
        ]);
        $imageNames = date('YmdHis').uniqid().'.'.$request->image->extension();
        $request->image->move(public_path('menu_images'), $imageNames);
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->image = $imageNames;
        $menu->description = $request->description;
        $menu->category_id = $request->category_id;
        $menu->save();
        session()->flash('status', $request->name. 'is updated successfully');
        return redirect('/management/menu');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            $menu->delete();
        }
        session()->flash('status', 'Menu deleted successfully');
        return redirect('/management/menu');
    }
}
