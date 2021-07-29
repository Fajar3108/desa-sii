<?php

namespace App\Http\Controllers;

use App\Http\Requests\VillageInfoRequest;
use App\Models\{VillageInfo, Slider, Page};
use RealRashid\SweetAlert\Facades\Alert;

class VillageInfoController extends Controller
{
    public function show()
    {
        $info = VillageInfo::first();
        $sliders = Slider::all();
        $pages = Page::latest()->paginate(10);

        return view('setting.index', compact('info', 'sliders', 'pages'));
    }

    public function update(VillageInfoRequest $request, $id)
    {
        $info = VillageInfo::find($id)->first();
        $info->update($request->all());

        ALert::success('Success', 'Village info updated successfuly');

        return redirect()->back();
    }
}
