@extends('client.baseClient')
@section('content')
<div class="container">
    <form action="" method="GET" class="mb-4">
        <div class="input-group mt-3">
            <input type="text" class="form-control" name="query" placeholder="Rechercher un bien..." required>
            <button class="btn btn-primary " type="submit">Rechercher</button>
        </div>
    </form>
    
    <h3 class="mb-4">Biens récemment ajoutés</h3>
    <div class="row">
        @foreach($biens as $bien)
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg" style="width: 300px; ">
                    <!-- Afficher une image du bien -->
                    <img src="{{asset('img/imgE.jpEg') }}" class="card-img-top " style="width: 300px" alt="{{ $bien->titre }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $bien->titre }}</h5>
                        <p class="card-text">
                            <strong>Prix:</strong> {{ $bien->prix }} €<br>
                            <strong>Ville:</strong> {{ $bien->ville }}
                        </p>
                        <a href="{{route('custumer.detailler_bien', $bien->id)}}" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
