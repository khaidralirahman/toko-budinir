<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        $label = Label::all();
        return view('admin.label.index', compact('label'));
    }

    public function create()
    {
        return view('admin.label.form');
    }

    public function store(Request $request)
    {
        $dataUpload = new Label();
        $dataUpload->label = $request->label;
        // Set the color to null if it's not provided, otherwise use the input value
        if (!$request->has('color') || empty($request->input('color'))) {
            $dataUpload->color = null;
        } else {
            $dataUpload->color = $request->input('color');
        }

        $dataUpload->save();

        return redirect('/admin/label')->with('success', 'Label created successfully.');
    }

    public function edit(string $id)
    {
        $label = Label::findOrFail($id);
        return view('admin.label.edit', compact('label'));
    }

    public function update(Request $request, string $id)
    {
        $label = Label::findOrFail($id);

        $label->label = $request->input('label');
        $label->color = $request->input('color');

        $label->save();

        return redirect('/admin/label')->with('success', 'Label updated successfully.');
    }

    public function destroy($id)
    {
        $label = Label::findOrFail($id);
        $label->delete();

        return redirect('/admin/label')->with('success', 'Label deleted successfully.');
    }
}
