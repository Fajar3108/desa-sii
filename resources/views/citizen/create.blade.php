@extends('layout.master')
@section('title', 'Tambah Penduduk')
@section('parentPageTitle', 'Penduduk')
@section('back-navigation', route('citizen.index'))


@section('content')

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('citizen.store') }}" method="POST">
                    @csrf
                    @include('citizen.partials.form')
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
