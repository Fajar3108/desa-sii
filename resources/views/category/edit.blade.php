@extends('layout.master')
@section('title', 'Edit Kategori')
@section('parentPageTitle', 'Kategori')


@section('content')

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    @include('category.partials.form')
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
