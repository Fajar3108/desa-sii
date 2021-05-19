@extends('layout.master')
@section('title', 'Dashboard')


@section('content')

<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card overflowhidden number-chart">
            <div class="body">
                <div class="number">
                    <h6>PENDUDUK</h6>
                    <span>{{ App\Models\Citizen::get()->count() }}</span>
                </div>
                <small class="text-muted">19% compared to last week</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card overflowhidden number-chart">
            <div class="body">
                <div class="number">
                    <h6>POSTS</h6>
                    <span>{{ App\Models\Post::get()->count() }}</span>
                </div>
                <small class="text-muted">19% compared to last week</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card overflowhidden number-chart">
            <div class="body">
                <div class="number">
                    <h6>GALLERY</h6>
                    <span>{{ App\Models\Gallery::get()->count() }}</span>
                </div>
                <small class="text-muted">19% compared to last week</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card overflowhidden number-chart">
            <div class="body">
                <div class="number">
                    <h6>Keluarga</h6>
                    <span>{{ App\Models\Family::get()->count() }}</span>
                </div>
                <small class="text-muted">19% compared to last week</small>
            </div>
        </div>
    </div>
</div>

@stop
