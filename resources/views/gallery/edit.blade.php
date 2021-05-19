@extends("layout.master")
@section('title', 'Edit Gallery')
@section('parentPageTitle', 'Gallery')

@section('content')

<form action="{{ route('gallery.update', $gallery->id) }}" method="POST" class="mb-4" enctype="multipart/form-data">
    @method("PATCH")
    @include('gallery.partials.form')
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

