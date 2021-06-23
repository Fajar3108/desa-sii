@extends('layout.master')
@section('title', 'Album')

@section('content')
<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nama Album" aria-label="Recipient's username" aria-describedby="basic-addon2" name="name">
        <button class="btn btn-primary input-group-append">
            Tambah Album
        </button>
    </div>
</form>

<div class="row clearfix">
    @foreach ($categories as $category)
    <div class="col-md-3 mb-4" >
        <a href="{{ route('category.show', $category->id) }}">
            <div class="card m-0 album-card"  style="height: 200px; background-color: #aaa;">
                @isset($category->galleries[$category->galleries->count() - 1]->image)
                <img src="{{ str_contains($category->galleries[$category->galleries->count() - 1]->image, "http") ? $category->galleries[$category->galleries->count() - 1]->image : asset('storage/' . $category->galleries[$category->galleries->count() - 1]->image) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 100%">
                @endif
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px; z-index: 1">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" title="Delete" onclick="handler(event)"><i class="fa fa-trash-o"></i></button>
                </form>
                <div class="card-img-overlay text-light rounded cat-cap" style="background-color: rgba(0,0,0,.5);">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text">Terdapat {{ $category->galleries->count() }} gambar dalam album ini</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    <div class="mt-3">
        {{ $categories->links() }}
    </div>
</div>

<script>
    function handler(e) {
        const result = confirm('Apa anda yakin ? semua gallery dengan category ini akan di hapus');

        if (!result) {
            e.preventDefault();
        }
    }
</script>

@stop
