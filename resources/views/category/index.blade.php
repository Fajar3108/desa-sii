@extends('layout.master')
@section('title', 'Album')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h2>Semua Album</h2>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route("category.create") }}" class="btn btn-primary btn-sm">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                            <tr>
                                <th>Nama Album</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        {{ $category->name }}
                                    </td>
                                    <td>

                                        <form action="{{ route("category.destroy", $category->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('category.show', $category->id) }}" class="btn btn-success" title="Show"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>

                                            <button type="submit" class="btn btn-danger" title="Delete" onclick="handler(event)"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                {{ $categories->links() }}
            </div>
        </div>
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
