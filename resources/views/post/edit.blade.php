@extends("layout.master")
@section('title', 'Edit Artikel')
@section('parentPageTitle', 'Artikel')

@section('content')

<form action="{{ route('post.update', $post->id) }}" method="post" class="mb-4" enctype="multipart/form-data">
    @method('PATCH')
    @include('post.partials.form')
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{ route('upload.store', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
    });
</script>

@endsection

