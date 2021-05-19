<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FamilyResource;
use App\Models\Family;

class FamilyController extends Controller
{
    public function index()
    {
        $families = Family::paginate(request()->per_page, ['*'], 'page', request()->page);
        return FamilyResource::collection($families);
    }
}
