<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/logo-cirendeu.png') }}" type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/components/auth.css') }}">
</head>
<body class="d-flex align-items-center justify-content-center">

<div class="big-background">
    <img src="{{ asset('images/logo-cirendeu.png') }}" alt="Logo">
</div>

<div class="card card-login" style="max-width: 800px;">
  <div class="row">
    <div class="col-md-6">
      <div class="card-body pl-md-5 pl-4">
        <img src="{{ asset('images/logo-cirendeu.png') }}" class="card-logo mt-4" alt="Logo">
        <h1 class="card-title h1">Login</h1>
        <p class="card-text text-muted">Welcome back to Cirendeu Admin Panel</p>
        <hr>
        <form class="form-signin mb-5" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="signin-username"><strong>Username</strong></label>
                <input type="text" class="form-control" id="signin-username" placeholder="Username" name="username">
                @error('username')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="signin-password"><strong>Password</strong></label>
                <input type="password" class="form-control" id="signin-password" placeholder="Password" name="password">
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-main btn-block text-white text-uppercase">Sign in</button>
        </form>
      </div>
    </div>
    <div class="col-md-6 card-image d-none d-md-block">
      <img src="https://raw.githubusercontent.com/darektoa/village-website/main/src/assets/images/profile/slide_3.jpeg" class="img-fluid rounded-start" alt="">
    </div>
  </div>
</div>

</body>
</html>
