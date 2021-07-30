<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->get();

        return response()->json($pages);
    }

    public function massDestroy(Request $request)
    {
        $ids = $request->ids;

        if (!isset($ids)) {
            return response()->json([
                'message' => "please select at least one data you want to delete"
            ], 404);
        }

        Page::whereIn('id', $ids)->delete();
        return response()->json(['message '=>"Pages Deleted successfully."]);
    }
}
