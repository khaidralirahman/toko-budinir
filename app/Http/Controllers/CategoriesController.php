<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Categories::all();
        return view('admin.categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataUpload = new Categories();
        $dataUpload->category = $request->category;

        if ($request->hasFile('media')) {
            $media = $request->file('media');
            $mediaName = time() . rand(100, 999) . "." . $media->getClientOriginalExtension();
            $media->move(public_path('assets/media'), $mediaName);
            $dataUpload->media = $mediaName;
        }

        $dataUpload->save();

        return redirect('/admin/categories')->with('success', 'Data baru berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Categories::findOrFail($id);
        return view('admin.categories.edit', compact('categories'));
    }

    public function update(Request $request, string $id)
    {
        $categories = Categories::findOrFail($id);

        $categories->update([
            'category' => $request->category,
            'media' => $request->media,
        ]);

        $categories->save();

        return redirect('/admin/categories')->with('success', 'categories updated successfully.');
    }

    public function destroy($id)
    {
        $categories = Categories::findOrFail($id);
        $categories->delete();

        return redirect('/admin/categories')->with('success', 'categories deleted successfully.');
    }
}
