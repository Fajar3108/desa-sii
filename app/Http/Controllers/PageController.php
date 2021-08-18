<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);

        return view('setting.pages', compact('pages'));
    }

    public function store(PageRequest $request)
    {
        Page::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        Alert::success('Success', 'Menu created successfuly');

        return back();
    }

    public function update(Page $page, PageRequest $request)
    {
        $page->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        Alert::success('Success', 'Menu updated successfuly');

        return back();
    }

    public function destroy(Page $page)
    {
        $page->delete();

        Alert::success('Success', 'Menu deleted successfuly');

        return back();
    }
}
