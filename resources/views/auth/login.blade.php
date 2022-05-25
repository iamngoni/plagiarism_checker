<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plagiarism Checker</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/media/image/favicon.png') }}"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ asset('vendors/bundle.css') }}" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
</head>
<body class="form-membership">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
</div>
<!-- end::page loader -->

<div class="form-wrapper">
    <h5>Sign in</h5>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email Address" name="email" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" name="remember" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
            </div>
        </div>
        <button class="btn btn-primary btn-block">Sign in</button>
        <hr>
        <p class="text-muted">Don't have an account?</p>
        <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register now!</a>
    </form>
    <!-- ./ form -->

</div>

<!-- Plugin scripts -->
<script src="{{ asset('vendors/bundle.js') }}"></script>

<!-- App scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
