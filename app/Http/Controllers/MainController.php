<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Logo;
use App\Models\Poster;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('categories')
                        ->where('is_active', true)
                        ->orderBy('views', 'desc')
                        ->latest()
                        ->get();

        $products5 = Product::with('categories')
                        ->where('is_active', true)
                        ->orderBy('views', 'desc')
                        ->latest()
                        ->paginate(5);

        $poster = poster::where('is_active', true)->latest()->get();
        $categories = Categories::latest()->get();
        $logo = logo::first();

        return view('main.index', compact('products', 'categories', 'products5', 'logo', 'poster'));
    }


    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->with('categories')->latest()->firstOrFail();
        $categories = Categories::all();
        $logo = logo::first();
        $product->increment('views');
        return view('main.detail', compact('product', 'categories', 'logo'));
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
