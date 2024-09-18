<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = Logo::latest()->get();
        return view('admin.logo.index', compact('logo'));
    }

    public function create()
    {
        return view('admin.logo.form');
    }

    public function store(Request $request)
    {
        $dataUpload = new Logo();

        if ($request->hasFile('logo')) {
            $upload = $request->file('logo');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/logo'), $nameFile);
            $dataUpload->logo = $nameFile;
        }
        $dataUpload->save();

        return redirect('/admin/logo')->with('success', 'Data baru berhasil ditambahkan!');
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
        $logo = logo::findOrFail($id);
        return view('admin.logo.edit', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logos = logo::findOrFail($id);

        if ($request->hasFile('logo')) {
            // Delete the old file if it exists
            if ($logos->logo && file_exists(public_path('assets/logo/' . $logos->logo))) {
                unlink(public_path('assets/logo/' . $logos->logo));
            }

            $logo = $request->file('logo');
            $logoName = time() . rand(100, 999) . "." . $logo->getClientOriginalExtension();
            $logo->move(public_path('assets/logo'), $logoName);

            // Update the logo name in the model
            $logos->logo = $logoName;
        }

        // Save the changes to the model
        $logos->save();

        return redirect('/admin/logo')->with('success', 'Logo updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $logo = logo::findOrFail($id);

        if ($logo->logo && file_exists(public_path('assets/logo/' . $logo->logo))) {
            unlink(public_path('assets/logo/' . $logo->logo));
        }
        $logo->delete();

        return redirect('/admin/logo')->with('success', 'Data produk berhasil dihapus!');
    }
}
