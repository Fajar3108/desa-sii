@extends('layout.master')
@section('title', 'Tambah Keluarga')
@section('parentPageTitle', 'Keluarga')


@section('content')

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('family.store') }}" method="POST">
                    @csrf
                    @include('family.partials.form')
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
