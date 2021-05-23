<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return view('category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        dd($category, $category->galleries);
        return view('category.show', compact('category'));
    }

    public function create()
    {
        return view('category.create', ['category' => new Category]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return redirect('/category');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect('/category');
    }

    public function destroy(Category $category)
    {
        $category->galleries()->delete();
        $category->delete();

        return redirect('/category');
    }
}
