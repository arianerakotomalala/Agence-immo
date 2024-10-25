@extends('client.baseClient')

@section('content')
<div class="container">
    <h3>Détails du bien : {{ $bien->titre }}</h3>
    <div class="row">
        <div class="col-md-8">
            <!-- Image principale du bien -->
            <img src="{{asset('img/imgE.jpEg') }}" class="img-fluid mb-3" style="width: 400px" alt="{{ $bien->titre }}">
            
            <h5>Description</h5>
            <p>{{ $bien->description }}</p>

            <h5>Informations</h5>
            <ul>
                <li><strong>Surface :</strong> {{ $bien->surface }} m²</li>
                <li><strong>Prix :</strong> {{ $bien->prix }} €</li>
                <li><strong>Adresse :</strong> {{ $bien->adresse }}</li>
                <li><strong>Ville :</strong> {{ $bien->ville }}</li>
                <li><strong>Code postal :</strong> {{ $bien->code_postal }}</li>
                <li><strong>Nombre de chambres :</strong> {{ $bien->chambre }}</li>
                <li><strong>Nombre d'étages :</strong> {{ $bien->etage }}</li>
                <li><strong>Nombre de pièces :</strong> {{ $bien->piece }}</li>
            </ul>
        </div>

        <div class="col-md-4 ">
            <div class="shadow-lg p-3 " >
            <h5>Ce bien vous interesse ?<br> Contactez nous ici .</h5>
            <form action="" method="POST">
                @csrf
                <input type="hidden" name="bien_id" value="{{ $bien->id }}">
                <div class="mb-3">
                    <label for="nom" class="form-label">Votre nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Votre email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Votre message</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Envoyer</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
