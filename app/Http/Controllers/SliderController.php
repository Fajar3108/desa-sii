<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Helpers\ImageHandler;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        if (Slider::all()->count() >= 5) {
            return back();
        }

        $image = ImageHandler::store($request->image, 'sliders');

        Slider::create(['image' => $image]);

        return back();
    }

    public function destroy(Slider $slider)
    {
        Storage::disk('public')->delete($slider->image);
        $slider->delete();

        return redirect()->back();
    }
}
