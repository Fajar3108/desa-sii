<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::orderBy('id', 'DESC')->paginate(request()->per_page, ['*'], 'page', request()->page));
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function massDestroy(Request $request)
    {
        $ids = $request->ids;

        if (!isset($ids)) {
            return response()->json([
                'message' => "please select at least one data you want to delete"
            ], 404);
        }

        Category::whereIn('id', $ids)->delete();
        return response()->json(['message '=>"Albums Deleted successfully."]);
    }
}
