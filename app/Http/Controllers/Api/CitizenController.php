<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Http\Resources\CitizenResource;

class CitizenController extends Controller
{
    public function index()
    {
        $citizens = Citizen::latest()->get();

        return new CitizenResource($citizens);
    }

    public function show(Citizen $citizen)
    {
        return new CitizenResource($citizen);
    }
}
