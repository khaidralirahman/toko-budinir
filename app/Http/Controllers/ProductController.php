<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Label;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('categories')->latest()->paginate(5);
        $categories = Categories::all();
        $label = Label::all();
        return view('admin.product.index', compact('product', 'categories', 'label'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::latest()->get();
        $label = Label::latest()->get();
        return view('admin.product.form', compact('categories', 'label'));
    }

    public function toggleStatus(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Toggle the is_active status
        $product->is_active = !$product->is_active;

        // Save the changes
        $product->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Product status updated successfully!');
    }

    public function search()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->labels_id = $request->input('labels_id');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->is_active = $request->input('is_active', true);
        $product->categories_id = $request->input('categories_id');
        $product->description = $request->input('description');
        $product->phone = $request->input('phone');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        $product->link = $request->input('link');
        $product->store = $request->input('store');

        if ($request->hasFile('head_photo')) {
            $head_photo = $request->file('head_photo');
            $head_photoName = time() . rand(100, 999) . "." . $head_photo->getClientOriginalExtension();
            $head_photo->move(public_path('assets/head_photo'), $head_photoName);
            $product->head_photo = $head_photoName;
        }

        if ($request->hasFile('head_photo_back')) {
            $head_photo_back = $request->file('head_photo_back');
            $head_photo_backName = time() . rand(100, 999) . "." . $head_photo_back->getClientOriginalExtension();
            $head_photo_back->move(public_path('assets/head_photo_back'), $head_photo_backName);
            $product->head_photo_back = $head_photo_backName;
        }

        if($request->hasFile('media')) {
            $mediaFiles = [];
            foreach($request->file('media') as $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('assets/media'), $filename);
                $mediaFiles[] = 'assets/media/'.$filename;
            }
            $product->media = json_encode($mediaFiles);
        }

        $slug = Str::slug($request->name);
        $i = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->name . '-' . $i);
            $i++;
        }
        $product->slug = $slug;

        $product->save();

        return redirect('/admin/product')->with('success', 'Data baru berhasil ditambahkan!');
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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories =Categories::all();
        $label =Label::all();
        return view('admin.product.edit',
        compact(
            'product',
            'categories',
            'label',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->labels_id = $request->input('labels_id');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->is_active = $request->input('is_active', true);
        $product->categories_id = $request->input('categories_id');
        $product->description = $request->input('description');
        $product->phone = $request->input('phone');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        $product->link = $request->input('link');
        $product->store = $request->input('store');

        if ($request->hasFile('head_photo')) {
            // Hapus file lama jika ada
            if ($product->head_photo && file_exists(public_path('assets/head_photo/' . $product->head_photo))) {
                unlink(public_path('assets/head_photo/' . $product->head_photo));
            }

            $head_photo = $request->file('head_photo');
            $head_photoName = time() . rand(100, 999) . "." . $head_photo->getClientOriginalExtension();
            $head_photo->move(public_path('assets/head_photo'), $head_photoName);
            $product->head_photo = $head_photoName;
        }

        if ($request->hasFile('head_photo_back')) {
            // Hapus file lama jika ada
            if ($product->head_photo_back && file_exists(public_path('assets/head_photo_back/' . $product->head_photo_back))) {
                unlink(public_path('assets/head_photo_back/' . $product->head_photo_back));
            }

            $head_photo_back = $request->file('head_photo_back');
            $head_photo_backName = time() . rand(100, 999) . "." . $head_photo_back->getClientOriginalExtension();
            $head_photo_back->move(public_path('assets/head_photo_back'), $head_photo_backName);
            $product->head_photo_back = $head_photo_backName;
        }

        if($request->hasFile('media')) {
            // Hapus media lama jika ada
            if ($product->media) {
                $oldMediaFiles = json_decode($product->media, true);
                foreach ($oldMediaFiles as $oldFile) {
                    if (file_exists(public_path($oldFile))) {
                        unlink(public_path($oldFile));
                    }
                }
            }

            $mediaFiles = [];
            foreach($request->file('media') as $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('assets/media'), $filename);
                $mediaFiles[] = 'assets/media/'.$filename;
            }
            $product->media = json_encode($mediaFiles);
        }

        // Generate slug from name if name is changed
        if ($request->name != $product->name) {
            $slug = Str::slug($request->name);
            $i = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = Str::slug($request->name . '-' . $i);
                $i++;
            }
            $product->slug = $slug;
        }

        $product->save();

        return redirect('/admin/product')->with('success', 'Data berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Hapus file head_photo jika ada
        if ($product->head_photo && file_exists(public_path('assets/head_photo/' . $product->head_photo))) {
            unlink(public_path('assets/head_photo/' . $product->head_photo));
        }

        // Hapus file head_photo_back jika ada
        if ($product->head_photo_back && file_exists(public_path('assets/head_photo_back/' . $product->head_photo_back))) {
            unlink(public_path('assets/head_photo_back/' . $product->head_photo_back));
        }

        // Hapus file media jika ada
        if ($product->media) {
            $mediaFiles = json_decode($product->media, true);
            foreach ($mediaFiles as $file) {
                if (file_exists(public_path($file))) {
                    unlink(public_path($file));
                }
            }
        }

        // Hapus produk dari database
        $product->delete();

        return redirect('/admin/product')->with('success', 'Data produk berhasil dihapus!');
    }

}
