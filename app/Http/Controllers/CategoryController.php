<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        return view('category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $galleries = $category->galleries()->orderBy('id', 'DESC')->paginate(10);
        return view('gallery.show', compact('galleries', 'category'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        ALert::success('Success', 'Category created successfuly');

        return redirect('/category');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        ALert::success('Success', 'Category updated successfuly');

        return redirect('/category');
    }

    public function destroy(Category $category)
    {
        $category->galleries()->delete();
        $category->delete();

        ALert::success('Success', 'Category deleted successfuly');

        return redirect('/category');
    }
}
