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
        $pages = Page::paginate(10)->latest();

        return view('pages.index', compact('pages'));
    }

    public function store(PageRequest $request)
    {
        Page::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        Alert::success('Success', 'Page created successfuly');

        return back();
    }

    public function update(Page $page, PageRequest $request)
    {
        $page->update([
            'name' => $request->name,
            'url' => $request->url,
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
