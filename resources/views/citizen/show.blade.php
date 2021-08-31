@extends('layout.master')
@section('title', 'Detail Penduduk')
@section('parentPageTitle', 'Penduduk')
@section('back-navigation', route('citizen.index'))

@section('content')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-primary">{{ $citizen->name }}</h6>
                <p class="card-text">NIK : {{ $citizen->nik }}</p>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th style="width: 250px">Jenis Kelamin</th>
                            <td>{{ $citizen->gender == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ $birthday = date('d M Y' , strtotime($citizen->birthday)) }} ({{ intval(now()->diffInDays($birthday) / 365) }} Tahun)</td>
                        </tr>
                        <tr>
                            <th>No Hp</th>
                            <td>{{ $citizen->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Status Ekonomi</th>
                            <td>{{ Str::replace("_", " ", $citizen->status) }}</td>
                        </tr>
                        <tr>
                            <th>RT / RW</th>
                            <td>{{ $citizen->rt . " / " . $citizen->rw  }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $citizen->address  }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px !important">Keluarga</h2>
                <p class="mb-0">No KK : <strong>{{ $citizen->family->number }}</strong></p>
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
                                <tr @if($citizen->id === request()->citizen->id) style="background-color: #cee5ff" @endif>
                                    <td>
                                        <a href="{{ route('citizen.show', $citizen->id) }}">{{ $citizen->name }}</a>
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

