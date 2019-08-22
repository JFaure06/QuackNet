<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>QuackNet</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .btn-register {
            width: 200px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            margin-bottom: 20px;
            background-color: #2a9055;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }

        .btn-login {
            width: 200px;
            height: 30px;
            margin-bottom: 20px;
            padding: 6px 0px;
            border-radius: 15px;
            background-color: #3490dc;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }
    </style>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('Quack', 'Quackbar') }}
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="top-right links" id="navbarSupportedContent">
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif
    </div>
</nav>

</header>

<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title">
            Welcome to the QuackNet!!
        </div>

        <div class="container mt-5">
            <div class="row align-items-center ">
                <div class="col-md-5">
                    <img src="https://lh6.ggpht.com/_Tau7JSVWn8NbPIaqwC4lrhS1Pg6a0IVAh_OVBackr1PCDHSY6bt4UQ2Us857SmGqQ8=w300" class="card-img-top" alt="...">
                </div>
                <div class="col-md-1"></div>
                <div class="card col-md-5" style="width: 18rem;">
                    <img src="" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">Découvrez ce qui se passe dans le monde en temps réel</p>
                        <p class="">Rejoignez QuackNet aujourd'hui</p>

                        <a href="{{ route('register') }}" class="btn btn-register active" role="button"
                           aria-disabled="true">Register</a>

                        <a href="{{ route('login') }}" class="btn btn-login active" role="button" aria-disabled="true">Login</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
