@extends('layout.master')
@section('title', 'Gallery')

@section('content')
<a href="{{ route('gallery.create') }}" class="btn btn-primary mb-4">Tambah</a>

@if (request()->is('category/*'))
<h3 class="mb-4">Album : {{ $galleries->first()->category->name }}</h3>
@endif
<div class="row clearfix">
    @foreach ($galleries as $gallery)
    <div class="col-md-3">
        <div class="card">
            <img src="{{ "storage/" . $gallery->image }}" class="card-img-top" style="object-fit: cover;">
            <div class="card-body">
                <form action="{{ route("gallery.destroy", $gallery->id) }}" method="POST" class="mb-0">
                    @method('DELETE')
                    @csrf

                    <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>

                    <button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <div class="mt-3">
        {{ $galleries->links() }}
    </div>
</div>

@stop

@section('page-script')

    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop

