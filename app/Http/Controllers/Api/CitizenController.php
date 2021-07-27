<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Http\Resources\CitizenResource;
use Illuminate\Http\Request;

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

    public function massDestroy(Request $request)
    {
        $ids = $request->ids;

        if (!isset($ids)) {
            return response()->json([
                'message' => "please select at least one data you want to delete"
            ], 404);
        }

        Citizen::whereIn('id', $ids)->delete();
        return response()->json(['message '=>"Citizens Deleted successfully."]);
    }
}
