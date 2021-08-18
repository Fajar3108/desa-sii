@extends('layout.master')
@section('title', 'Menu')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h2>Daftar Menu</h2>
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
                                <th>Menu Name</th>
                                <th>URL</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($pages as $page)
                                <tr>
                                    <td>
                                        {{ $page->name }}
                                    </td>
                                    <td>
                                        <a href="{{ $page->url }}" target="_blank">{{ $page->url }}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route("page.destroy", $page->id) }}" method="POST" class="mb-0">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></button>

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
                {{ $pages->links() }}
            </div>
        </div>
    </div>
</div>

@stop

@section('page-script')

    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop

