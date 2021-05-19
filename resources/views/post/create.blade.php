@extends("layout.master")
@section('title', 'Tambah Artikel')
@section('parentPageTitle', 'Artikel')

@section('content')

<form action="{{ route('post.store') }}" method="post" class="mb-4" enctype="multipart/form-data">
    @include('post.partials.form')
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{ route('upload.store', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
    });
</script>

@endsection

