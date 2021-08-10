<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background: hsla(225, 78%, 59%, 1);
            background: linear-gradient(90deg, hsla(225, 78%, 59%, 1) 0%, hsla(197, 85%, 51%, 1) 100%);
            background: -moz-linear-gradient(90deg, hsla(225, 78%, 59%, 1) 0%, hsla(197, 85%, 51%, 1) 100%);
            background: -webkit-linear-gradient(90deg, hsla(225, 78%, 59%, 1) 0%, hsla(197, 85%, 51%, 1) 100%);
            filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#456FE8", endColorstr="#19B0EC", GradientType=1 );
        }

        .login-card {
            flex-shrink: 0;
            max-width: 400px;
            margin: 0 auto
        }

        .form-signin {
            width: 100%;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
    </style>
</head>
<body class="text-center">
<div class="card shadow-lg p-4 rounded login-card">
    <div class="body">
        <form class="form-signin" action="{{ route('login') }}" method="POST">
            @csrf
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <div class="form-group">
                <label for="signin-username" class="control-label sr-only">Username</label>
                <input type="text" class="form-control" id="signin-username" placeholder="Username" name="username">
                @error('username')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="signin-password" class="control-label sr-only">Password</label>
                <input type="password" class="form-control" id="signin-password" placeholder="Password" name="password">
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </form>
    </div>
</div>

</body>
</html>
