@extends('layout.authentication')
@section('title', 'Register')


@section('content')

<div class="vertical-align-wrap">
	<div class="vertical-align-middle auth-main">
		<div class="auth-box">
            {{-- <div class="top">
                <img src="{{url('/')}}/assets/img/logo-white.svg" alt="Lucid">
            </div> --}}
			<div class="card">
                <div class="header">
                    <p class="lead">Create an account</p>
                </div>
                <div class="body">
                    <form class="form-auth-small" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="signup-name" class="control-label sr-only">Name</label>
                            <input type="text" class="form-control" id="signup-name" placeholder="Full Name" name="name" value="{{ old('name') ?? '' }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="signup-email" class="control-label sr-only">Email</label>
                            <input type="email" class="form-control" id="signup-email" placeholder="Email Address" name="email" value="{{ old('email') ?? '' }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="signup-username" class="control-label sr-only">Name</label>
                            <input type="text" class="form-control" id="signup-username" placeholder="Username" name="username" value="{{ old('username') ?? '' }}">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="signup-password" class="control-label sr-only">Password</label>
                            <input type="password" class="form-control" id="signup-password" placeholder="Password" name="password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="signup-password-confirm" class="control-label sr-only">Confirm Password</label>
                            <input type="password" class="form-control" id="signup-password-confirm" placeholder="Confirm Password" name="password_confirmation">
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
                        <div class="bottom">
                            <span class="helper-text">Already have an account? <a href="{{route('login')}}">Login</a></span>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>

@stop
