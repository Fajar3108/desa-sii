@extends('layout.master')
@section('title', 'Profile')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('user-profile-information.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="name" name="name" value="{{ $user->name }}">
                        @error('name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="username" name="username" value="{{ $user->username }}">
                        @error('username')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="email" name="email" value="{{ $user->email }}">
                        @error('email')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary px-4">Save</button>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('user-profile-information.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="name" name="name" value="{{ $user->name }}">
                        @error('name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="username" name="username" value="{{ $user->username }}">
                        @error('username')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="email" name="email" value="{{ $user->email }}">
                        @error('email')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary px-4">Save</button>
                </form>
            </div>
        </div>
    </div>

</div>
@stop

@section('page-script')

    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop
