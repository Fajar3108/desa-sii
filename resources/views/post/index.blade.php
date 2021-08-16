@extends('layout.master')
@section('title', 'Artikel')

@section('custom-style');
<style>
.post-title {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    max-width: 500px;
}
</style>

@section('content')
<div class="row clearfix">
    <div class="col-12">
        <form action="{{ route('post.index') }}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari judul artikel disini..." aria-describedby="searchButton" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="searchButton">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h2>Daftar Artikel</h2>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route("post.create") }}" class="btn btn-primary btn-sm">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive" id="family-table">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                            <tr>
                                <th>Judul Artikel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <p class="post-title mb-0">{{ $post->title }}</p>
                                    </td>

                                    <td>
                                        <form action="{{ route("post.destroy", $post->id) }}" method="POST" class="mb-0">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-info" title="Show"><i class="fa fa-eye"></i></a>

                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>

                                            <button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

@stop

@section('page-script')

    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop

