<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Helpers\ImageHandler;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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

        ALert::success('Success', 'Slider created successfuly');

        return back();
    }

    public function destroy(Slider $slider)
    {
        Storage::disk('public')->delete($slider->image);
        $slider->delete();

        ALert::success('Success', 'Slider deleted successfuly');

        return redirect()->back();
    }
}
