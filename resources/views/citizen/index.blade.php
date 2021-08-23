@extends('layout.master')
@section('title', 'Penduduk')

@section('custom-style')
<style>
.alamat {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    max-width: 500px;
}
</style>

@section('content')

<div class="row clearfix">
    <div class="col-12">
        <form action="{{ route('citizen.index') }}">
            <div class="d-flex">
                <div style="width: 150px">
                    <select name="search_by" id="search_by" class="form-control" aria-describedby="basic-addon1">
                        <option value="name">Nama</option>
                        <option value="no_hp">No Telp</option>
                        <option value="nik">NIK</option>
                        <option value="address">Alamat</option>
                        <option value="rt">RT</option>
                        <option value="rw">RW</option>
                        <option value="gender">Jenis Kelamin (L/P)</option>
                        <option value="status">Status Ekonomi ( Mampu / Kurang Mampu )</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari penduduk disini..." aria-describedby="searchButton" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="searchButton">Search</button>
                    </div>
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
                                <th>RT/RW</th>
                                <th>Jenis kelamin</th>
                                <th>Status Ekonomi</th>
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
                                        <p class="alamat"><i class="zmdi"></i>{{ $citizen->address }}</p>
                                    </td>
                                    <td>
                                        <span><i class="zmdi"></i>{{ $citizen->rt }}/{{ $citizen->rw }}</span>
                                    </td>
                                    <td>
                                        <span><i class="zmdi zmdi-pin"></i>{{ $citizen->gender == 'L' ? 'Laki - laki' : 'Perempuan' }}</span>
                                    </td>
                                    <td>{{ $citizen->status == 'mampu' ? 'Mampu' : 'Kurang Mampu' }}</td>
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
