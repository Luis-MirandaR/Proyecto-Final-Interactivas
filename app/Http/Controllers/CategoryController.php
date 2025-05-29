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
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // Validate the request data
            $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            ]);

            // Create a new category
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            // Redirect to categories index with success message
            return redirect()->route('categories')->with('success', 'Category created successfully.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred while creating the category: ' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Delete the category
        $category->delete();

        // Redirect to categories index with success message
        return redirect()->route('categories')->with('success', 'Category deleted successfully.');
    }
}
