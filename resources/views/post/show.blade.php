@extends('layout.master')
@section('title', 'Detail Artikel')
@section('parentPageTitle', 'Artikel')
@section('back-navigation', route('post.index'))

@section('content')
<div class="row clearfix">

    <div class="col-8">
        <div class="card">
            <img src="{{ str_contains($post->thumbnail, "http") ? $post->thumbnail : asset("storage/" . $post->thumbnail) }}" class="card-img-top" alt="..." style="max-height: 350px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{!! $post->description !!}</p>
                <p>
                @foreach ($post->tags as $tag)
                    <a href="" class="mr-1 mb-1">#{{ $tag->slug }}</a>
                @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@stop
