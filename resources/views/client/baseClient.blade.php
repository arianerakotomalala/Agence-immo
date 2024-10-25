<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Agence Immobilier</title>
    <style>
        .nav-item:hover {
            color: rgb(57, 57, 231);
            background-color: white;
            border-radius: 3px;
            opacity: 0.7;
        }
        .nom {
            text-align: end;
        }
    </style>
</head>
<body>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="height: 80px">
            <a class="navbar-brand me-5" href=" ">Agence Immobilier</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav"> 
                <ul class="navbar-nav">
                    <li class="nav-item me-5">
                        <a class="nav-link" aria-current="page" href="">Home</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="{{route('custumer.affichers_biens')}}">Trouver un bien</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="{{route('custumer.contacter_form')}}">Nous contacter</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="{{route('custumer.show_profil')}}">Mon profil</a>
                    </li>
                        @auth
                            {{ Auth::user()->name }}
                        @endauth
                        @guest
                        @endguest
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
