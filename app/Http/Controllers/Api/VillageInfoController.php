<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VillageInfo;
use App\Http\Resources\VillageInfoResource;

class VillageInfoController extends Controller
{
    public function index()
    {
        $info = VillageInfo::first();

        return new VillageInfoResource($info);
    }
}
