<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::paginate(5);
        return view("management.table")->with('tables', $tables);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::all();
        return view("management.tableCreate")->with('tables', $tables);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tables'
        ]);
        // this is the code that will be executed when the form is submitted
        $table = new Table();
        $table->name = $request->name;
        $table->save();
        session()->flash('status', 'Table created successfully');
        return redirect('/management/table');
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
        $table = Table::find($id);
        return view("management.tableEdit")->with('table', $table);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:tables,name,' . $id
        ]);
        $table = Table::find($id);
        $table->name = $request->name;
        $table->save();
        session()->flash('status', 'Table updated successfully');
        return redirect('/management/table');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = Table::find($id);
        $table->delete();
        session()->flash('status', 'Table deleted successfully');
        return redirect('/management/table');
    }
}
