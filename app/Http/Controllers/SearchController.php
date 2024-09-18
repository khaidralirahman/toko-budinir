<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Logo;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function product(Request $request)
    {
        // Start the query to get active products with categories
        $productsQuery = Product::with('categories')
                            ->where('is_active', true)
                            ->orderBy('views', 'desc');

        // Apply search filter if the 'name' field is filled
        if ($request->filled('name')) {
            $productsQuery->where('name', 'like', '%' . $request->name . '%');
        }

        // Execute the query to get the products
        $products = $productsQuery->latest()->get();
        // Get the count of the products found
        $productsCount = $products->count();
        // Pass the search term to the view
        $searchTerm = $request->name;
        $categories = Categories::all();
        $logo = logo::first();
        return view('search.product', compact('products', 'categories', 'productsCount', 'searchTerm', 'logo'));
    }
    public function category($categoryName)
    {
        // Retrieve the category based on the given ID
        $category = Categories::where('category', $categoryName)->firstOrFail();

        // Get products that belong to this category and are active
        $products = Product::with('categories')
                        ->where('is_active', true)
                        ->where('categories_id', $category->id)
                        ->orderBy('views', 'desc')
                        ->latest()
                        ->get();

        // Get the count of the products found
        $productsCount = $products->count();

        // Get all categories for filtering
        $categories = Categories::all();
        $logo = logo::first();

        return view('search.category', compact('products', 'categories', 'productsCount', 'category', 'logo'));
    }

    public function admin(Request $request)
    {
        $products = Product::query();

        if ($request->filled('name')) {
            $products->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('categories_id')) {
            $products->where('categories_id', 'like', '%' . $request->categories_id . '%');
        }

        if ($request->filled('updated_at')) {
            $dates = explode(' to ', $request->updated_at);
            if (count($dates) == 2) {
                $startDate = $dates[0];
                $endDate = $dates[1];
                $products->whereBetween('updated_at', [$startDate, $endDate]);
            }
        }

        $search = $products->latest()->get();

        $categories = Categories::all();

        return view('search.admin', compact('search', 'categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
