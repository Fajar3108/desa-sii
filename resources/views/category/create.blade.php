@extends('layout.master')
@section('title', 'Tambah Kategori')
@section('parentPageTitle', 'Kategori')


@section('content')

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    @include('category.partials.form')
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
