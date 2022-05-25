<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create An Account</title>

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
    <h5>Create account</h5>

    <!-- form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Full Name" required autofocus>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
        </div>
        <button class="btn btn-primary btn-block">Register</button>
        <hr>
        <p class="text-muted">Already have an account?</p>
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Sign in!</a>
    </form>
    <!-- ./ form -->

</div>

<!-- Plugin scripts -->
<script src="{{ asset('vendors/bundle.js') }}"></script>

<!-- App scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
