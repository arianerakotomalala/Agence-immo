<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>form</title>
    <style>
        .width{
            width: 500px
        }
        .margin{
            margin-left:150px 
        }
        .card{
            margin-top:100px;
        }
        img[src="{{asset('img/img.jpg')}}"]{
            width: 100px;
            margin-left:160px ;
            border-radius: 60px
        }
        label{
            color: 
        }
    </style>
</head>
<body>
        <div class="container  mt-5">   
            <div class="row justify-content-center ">
                <div class="col-md-7 width">
                    <div class="card shadow-lg ">
                        <div class="card-header">
                            <img src="{{asset('img/img.jpg')}}" alt="" srcset="">
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group mt-3">
                                    @if (@session('success'))
                                    {{session('success')}}
                                        
                                    @endif
                                    <label for="numero" style="font-weight:bold">Numero</label>
                                    @error('numero')
                                        {{$message}}
                                    @enderror
                                    <input type="numero" class="form-control" id="email" name="numero" placeholder="Entrez votre numero" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password" style="font-weight:bold" >Mot de passe</label>
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 p-2 w-100">Se connecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>





































