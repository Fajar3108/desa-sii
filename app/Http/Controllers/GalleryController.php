<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\GalleryRequest;
use App\Helpers\ImageHandler;
use App\Models\{Gallery, Category};

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);

        return view('gallery.index', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    public function create()
    {
        $categories = Category::all();

        $gallery = new Gallery;
        $gallery->category = new Category;

        return view('gallery.create', compact('categories', 'gallery'));
    }

    public function store(GalleryRequest $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $image = ImageHandler::store($request->image, 'galleries');

        Gallery::create([
            'image' => $image,
            'category_id' => $request->category_id
        ]);

        return redirect('/gallery');
    }

    public function edit(Gallery $gallery)
    {
        $categories = Category::all();

        return view('gallery.edit', compact('gallery', 'categories'));
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        if($request->file('image')){
            Storage::disk('public')->delete($gallery->image);
            $image = ImageHandler::store($request->image, 'galleries');
        } else{
            $image = $gallery->image;
        }

        $gallery->update([
            'image' => $image,
            'category_id' => $request->category_id
        ]);

        return redirect('/gallery');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->back();
    }
}
