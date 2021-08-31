@extends('layout.master')
@section('title', 'Keluarga')
@section('parentPageTitle', 'Penduduk')
@section('back-navigation', route('citizen.index'))

@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px !important">Keluarga <span class="text-primary">{{ $citizen->name }}</span></h2>
                <p class="mb-0">No KK : {{ $citizen->family->number }}</p>
                <p class="mb-0">Jumlah anggota kelarga : {{ $citizens->count() }}</p>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal lahir</th>
                                <th>Alamat</th>
                                <th>Jenis kelamin</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($citizens as $citizen)
                                <tr @if($citizen->id === request()->citizen->id) class="bg-primary text-white" @endif>
                                    <td>
                                        {{ $citizen->name }}
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
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@stop

@section('page-script')

    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop

