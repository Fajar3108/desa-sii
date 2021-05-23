<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::paginate(request()->per_page, ['*'], 'page', request()->page));
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
}
