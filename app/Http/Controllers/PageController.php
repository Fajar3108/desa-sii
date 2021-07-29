<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    public function store(PageRequest $request)
    {
        Page::create([
            'name' => $request->page_name,
            'url' => $request->page_url,
        ]);

        Alert::success('Success', 'Page created successfuly');

        return back();
    }

    public function update(Page $page, PageRequest $request)
    {
        $page->update([
            'name' => $request->page_name,
            'url' => $request->page_url,
        ]);

        Alert::success('Success', 'Page updated successfuly');

        return back();
    }

    public function destroy(Page $page)
    {
        $page->delete();

        Alert::success('Success', 'Page deleted successfuly');

        return back();
    }
}
