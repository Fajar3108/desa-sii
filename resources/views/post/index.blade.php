@extends('layout.master')
@section('title', 'Artikel')

@section('custom-style');
<style>
.title-limit {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    max-width: 500px;
}
.desc-limit {
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100%;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}
</style>

@section('content')
<div class="row clearfix">
    <div class="col-12 row m-0 p-0">
        <div class="col-6">
            <a href="{{ route("post.create") }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="col-6 text-right">
            <form action="{{ route('post.index') }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari judul artikel disini..." aria-describedby="searchButton" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="searchButton">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="col-12 col-md-6 mb-3 position-relative" style="height: 300px">
            <a href="{{ route('post.show', $post->id) }}">
                <div class="card bg-dark text-white position-relative">
                    <img src="{{ str_contains($post->thumbnail, "http") ? $post->thumbnail : asset("storage/" . $post->thumbnail) }}" class="card-img" alt="..." style="height: 100%; object-fit: cover">
                    <div class="card-img-overlay d-flex flex-column justify-content-end" style="background-color: rgba(0,0,0,.3)">
                        <h5 class="card-title title-limit">{{ $post->title }}</h5>
                        <p class="card-text desc-limit">{{ $post->description }}.</p>
                        <p class="card-text">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </a>

            <div class="position-absolute" style="top: 15; right: 30; z-index: 99;">
                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                    @csrf
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success btn-lg"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    @endforeach

    <div class="my-3 mx-auto">
        {{ $posts->onEachSide(1)->links() }}
    </div>

</div>

@stop

@section('page-script')

    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop

