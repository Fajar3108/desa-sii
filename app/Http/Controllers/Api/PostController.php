<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(request()->per_page, ['*'], 'page', request()->page);

        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function massDestroy(Request $request)
    {
        $ids = $request->ids;

        if (!isset($ids)) {
            return response()->json([
                'message' => "please select at least one data you want to delete"
            ], 404);
        }

        Post::whereIn('id', $ids)->delete();
        return response()->json(['message '=>"Posts Deleted successfully."]);
    }
}
