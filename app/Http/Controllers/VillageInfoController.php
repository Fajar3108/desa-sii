<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VillageInfoRequest;
use App\Models\VillageInfo;

class VillageInfoController extends Controller
{
    public function show()
    {
        $info = VillageInfo::first();

        return view('setting.index', compact('info'));
    }

    public function update(VillageInfoRequest $request, $id)
    {
        $info = VillageInfo::find($id)->first();
        $info->update($request->all());

        return redirect()->back();
    }
}
