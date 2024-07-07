<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //First validate all inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable',
        ]);

        //Create category
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0,
        ]);
        //After create category redirect to category list and return message
        return redirect('/category')->with('status', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //First validate all inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable',
        ]);

        //Update category
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true?1:0,
        ]);
        //After update category redirect to category list and return message
        return redirect('/category')->with('status', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //Delete specific category
        $category->delete();
        //After delete category redirect to category list and return message
        return redirect('/category')->with('status', 'Delete successfully.');
    }
}
