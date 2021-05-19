@extends('layout.master')
@section('title', 'Edit Keluarga')
@section('parentPageTitle', 'Keluarga')


@section('content')

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('family.update', $family->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    @include('family.partials.form')
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
