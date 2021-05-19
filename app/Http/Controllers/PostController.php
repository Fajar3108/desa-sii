<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
use App\Helpers\ImageHandler;
use App\Models\{Post, Tag};

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function create()
    {
        return view("post.create", ['post' => new Post]);
    }

    public function store(PostRequest $request)
    {
        $request->validate([
            'thumbnail' => 'required'
        ]);

        $tags = $this->tagFilter($request->tags);

        $thumbnail = ImageHandler::store($request->thumbnail, 'posts');

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $thumbnail
        ]);

        $post->tags()->attach($tags);

        return redirect('/post');
    }

    public function upload(Request $request)
    {
        $file = $request->file('upload') ? ImageHandler::store($request->upload, 'posts') : null;

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset(Storage::url($file));
        $message = 'Image upload successfully';

        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";

        @header('Content-type: text/html; charset=utf-8');
        echo $response;
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $tags = $this->tagFilter($request->tags);

        if($request->file('thumbnail')){
            Storage::disk('public')->delete($post->thumbnail);
            $thumbnail = ImageHandler::store($request->thumbnail, 'posts');
        } else{
            $thumbnail = $post->thumbnail;
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $thumbnail
        ]);

        $post->tags()->sync($tags);

        return redirect('/post');
    }

    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->thumbnail);
        $post->tags()->detach();
        $post->delete();
        return redirect('/post');
    }

    public function tagFilter($tags)
    {
        $results = [];

        foreach($tags as $tag){
            $tempTag = Tag::firstOrCreate(
                ['slug' => Str::slug($tag)],
                ['name' => $tag]
            );

            $results[] = $tempTag->id;
        }

        return $results;
    }
}
