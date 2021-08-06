@extends('layout.master')
@section('title', 'Penduduk')


@section('content')

<div class="row clearfix">
    <div class="col-12">
        <form action="{{ route('citizen.index') }}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari penduduk disini..." aria-describedby="searchButton" name="keyword">
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
                        <h2>Data Penduduk</h2>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route("citizen.create") }}" class="btn btn-primary btn-sm">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No Telp</th>
                                <th>Tanggal lahir</th>
                                <th>Alamat</th>
                                <th>Jenis kelamin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($citizens as $citizen)
                                <tr>
                                    <td>
                                        {{ $citizen->name }}
                                    </td>
                                    <td>
                                        {{ $citizen->no_hp }}
                                    </td>
                                    <td>
                                        <span><i class="zmdi"></i>{{ date('d M Y' , strtotime($citizen->birthday)) }}</span>
                                    </td>
                                    <td>
                                        <span><i class="zmdi"></i>{{ $citizen->address }}</span>
                                    </td>
                                    <td>
                                        <address><i class="zmdi zmdi-pin"></i>{{ $citizen->gender == 'L' ? 'Laki - laki' : 'Perempuan' }}</address>
                                    </td>
                                    <td>

                                        <form action="{{ route("citizen.destroy", $citizen->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('citizen.show', $citizen->id) }}" class="btn btn-success" title="Show"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('citizen.edit', $citizen->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>

                                            <button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $citizens->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@stop

@section('page-script')

    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop
