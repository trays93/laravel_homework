<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::with('uploader')
            ->get();

        return view('images.index', [
            'images' => $images,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|image|max:4098',
        ]);

        $image = $request->file('file');
        $newName = Hash::make($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $newName);

        $im = new Image();
        $im->title = $request->get('title');
        $im->image = $newName;
        $im->uploader()->associate(Auth::user());
        $im->save();

        return redirect('/gallery/create')
            ->with('success', 'Image uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $image = Image::with('uploader')->find($id);

        if ($image == null) {
            return redirect()->route('images');
        }

        return view('images.edit', [
            'image' => $image,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'image|max:4098',
        ]);

        $image = Image::with('uploader')->find($id);
        $newImage = $request->file('file');

        if ($image == null) {
            return redirect()->route('images');
        }

        if ($newImage != null) {
            $newName = Hash::make($newImage->getClientOriginalName()) . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('images'), $newName);
            $image->image = $newName;
        }

        $image->title = $request->get('title');
        $image->image = $newName;
        $image->uploader()->associate(Auth::user());
        $image->save();

        return redirect("/gallery/edit/{$image->id}")
            ->with('success', 'Image modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $image = Image::with('uploader')->find($id);

        if ($image != null) {
            $image->delete();
        }

        return redirect()->route('images');
    }
}
