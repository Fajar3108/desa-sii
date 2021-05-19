@extends('layout.master')
@section('title', 'Detail Gallery')
@section('parentPageTitle', 'Gallery')


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset("storage/" . $gallery->image) }}">
        </div>
    </div>
</div>
@stop
