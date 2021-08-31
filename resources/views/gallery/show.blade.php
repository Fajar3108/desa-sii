@extends('layout.master')
@section('title', "Gallery")
@section('parentPageTitle', 'Album')
@section('back-navigation', route('category.index'))


@section('content')
<form action="{{ route('gallery.store', $category->id) }}" method="POST" class="mb-3" enctype="multipart/form-data">
    @csrf
    <div class="input-group">
        <input type="file" class="form-control" placeholder="Nama Album" aria-label="Recipient's username" aria-describedby="basic-addon2" name="image">
        <button class="btn btn-primary" type="submit">
            Tambah Gallery
        </button>
    </div>
    @error('image')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</form>

<div class="row clearfix">
    @foreach ($galleries as $gallery)
    <div class="col-md-3 mb-4" >
        <div class="card m-0 album-card"  style="height: 200px; background-color: #aaa;">
            <img src="{{ str_contains($gallery->image, "http") ? $gallery->image : asset('storage/' . $gallery->image) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 100%">
            <form action="{{ route('gallery.destroy', [$category->id, $gallery->id]) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px;">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger rounded-circle"><h5 style="display: inline">&times;</h5></button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@stop
