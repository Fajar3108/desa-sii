@extends('layout.master')
@section('title', 'Detail Artikel')
@section('parentPageTitle', 'Artikel')


@section('content')
    <img src="{{ str_contains($post->thumbnail, "http") ? $post->thumbnail : asset("storage/" . $post->thumbnail) }}">
    <h1>{{ $post->title }}</h1>
    {!! $post->description !!}
    @foreach ($post->tags as $tag)
        <p><a href="">#{{ $tag->slug }}</a></p>
    @endforeach
@stop
