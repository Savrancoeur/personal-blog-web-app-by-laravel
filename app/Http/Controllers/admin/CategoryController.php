<?php

namespace App\Http\Controllers\admin;

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
        $categories  = Category::paginate(10);
        return view('admin-panel.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('categories.index')->with('successMsg', 'You have successfully created a category!');
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
        return view('admin-panel.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id
        ]);
        Category::find($id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('categories.index')->with('successMsg', 'You have successfully updated a category!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index')->with('successMsg', 'You have successfully deleted a category!');
    }
}
