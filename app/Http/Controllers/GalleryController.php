<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Helpers\ImageHandler;
use App\Models\{Gallery, Category};

class GalleryController extends Controller
{
    public function store(Category $category, Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $image = ImageHandler::store($request->image, 'galleries');

        $category->galleries()->create(['image' => $image]);

        return redirect()->route('category.show', $category->id);
    }

    public function destroy(Category $category, Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->back();
    }
}
