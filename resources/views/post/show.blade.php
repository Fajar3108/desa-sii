@extends('layout.master')
@section('title', 'Detail Artikel')
@section('parentPageTitle', 'Artikel')
@section('back-navigation', route('post.index'))

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <img src="{{ str_contains($post->thumbnail, "http") ? $post->thumbnail : asset("storage/" . $post->thumbnail) }}">
                <h1>{{ $post->title }}</h1>
                {!! $post->description !!}
                @foreach ($post->tags as $tag)
                <p><a href="">#{{ $tag->slug }}</a></p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
