@extends('layout.master')
@section('title', 'Edit Penduduk')
@section('parentPageTitle', 'Penduduk')


@section('content')

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('citizen.update', $citizen->id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    @include('citizen.partials.form', ['citizen' => $citizen])
                    <button class="btn btn-success">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
