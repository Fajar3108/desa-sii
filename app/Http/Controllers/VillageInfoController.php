<?php

namespace App\Http\Controllers;

use App\Http\Requests\VillageInfoRequest;
use App\Models\{VillageInfo, Slider, Page};
use RealRashid\SweetAlert\Facades\Alert;

class VillageInfoController extends Controller
{
    public function setting()
    {
        $info = VillageInfo::first();

        return view('setting.settings', compact('info'));
    }

    public function slider()
    {
        $sliders = Slider::all();

        return view('setting.slider', compact('sliders'));
    }

    public function update(VillageInfoRequest $request, $id)
    {
        $info = VillageInfo::find($id)->first();
        $info->update($request->all());

        ALert::success('Success', 'Village info updated successfuly');

        return redirect()->back();
    }
}
