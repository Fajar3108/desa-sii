<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\GalleryResource;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(request()->per_page, ['*'], 'page', request()->page);

        return GalleryResource::collection($galleries);
    }

    public function massDestroy(Request $request)
    {
        $ids = $request->ids;

        if (!isset($ids)) {
            return response()->json([
                'message' => "please select at least one data you want to delete"
            ], 404);
        }

        Gallery::whereIn('id', $ids)->delete();
        return response()->json(['message '=>"Galleries Deleted successfully."]);
    }
}
