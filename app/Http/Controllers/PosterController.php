<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poster;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poster = poster::all();
        return view('admin.poster.index', compact('poster'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.poster.form');
    }

    public function toggleStatus(Request $request, $id)
    {
        // Find the poster by ID
        $poster = poster::findOrFail($id);

        // Toggle the is_active status
        $poster->is_active = !$poster->is_active;

        // Save the changes
        $poster->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'poster status updated successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $poster = new poster();
        $poster->title = $request->input('title');
        $poster->subtitle = $request->input('subtitle');
        $poster->color = $request->input('color');

        if ($request->hasFile('media')) {
            $media = $request->file('media');
            $mediaName = time() . rand(100, 999) . "." . $media->getClientOriginalExtension();
            $media->move(public_path('assets/media'), $mediaName);
            $poster->media = $mediaName;
        }

        $poster->save();

        return redirect('/admin/poster')->with('success', 'Data baru berhasil ditambahkan!');
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
        $poster =poster::findOrFail($id);
        return view('admin.poster.edit',
        compact(
            'poster',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $poster = poster::findOrFail($id);
        $poster->title = $request->input('title');
        $poster->subtitle = $request->input('subtitle');
        $poster->color = $request->input('color');

        if ($request->hasFile('media')) {
            // Hapus file lama jika ada
            if ($poster->media && file_exists(public_path('assets/media/' . $poster->media))) {
                unlink(public_path('assets/media/' . $poster->media));
            }

            $media = $request->file('media');
            $mediaName = time() . rand(100, 999) . "." . $media->getClientOriginalExtension();
            $media->move(public_path('assets/media'), $mediaName);
            $poster->media = $mediaName;
        }

        $poster->save();

        return redirect('/admin/poster')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poster = poster::findOrFail($id);

        // Hapus file head_photo jika ada
        if ($poster->head_photo && file_exists(public_path('assets/media/' . $poster->media))) {
            unlink(public_path('assets/media/' . $poster->media));
        }

        $poster->delete();

        return redirect('/admin/poster')->with('success', 'Data produk berhasil dihapus!');
    }
}
