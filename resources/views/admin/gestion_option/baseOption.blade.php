<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title></title>
    <style>
        .nav-item :hover{
            color: rgb(57, 57, 231);
            background-color:white; 
            border-radius: 3px;
            opacity:0.7;
        }
        .nom{
            text-align: end;
        }
    </style>
</head>
<body>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="height: 80px">
            <a class="navbar-brand me-5" href=" ">Agence Immobilier</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collape" data-bs-target="#navbaNav"aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> </span>
            </button>
                <div class="collapse navbar-collapse " id="navbarNav"> 
                    <ul class="navbar-nav">
                        <li class="nav-item me-5">
                            <a class="nav-link " aria-current="page" href="{{route('option.addOption')}}">Gerer les options</a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('bien.lister_Form')}}" class="nav-link">Gerer les biens</a>
                        </li>
                        <li class="nav-item nom ">
                            @auth
                                {{Auth ::user->name}}
                            @endauth
                            @guest
                                
                            @endguest

                        </li>
                    </ul>
                </div>
            </nav>
        @yield('content')
    </div>
</body>
</html>