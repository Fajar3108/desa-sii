<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::lates()->paginate(10);
    }

    public function show(Page $page)
    {
        dd($page);
    }

    public function update(Page $page, Request $request)
    {
        $page->update([
            'value' => $request->value,
        ]);
    }
}
