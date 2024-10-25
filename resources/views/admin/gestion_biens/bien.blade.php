@extends('admin.gestion_option.baseOption')
<style>
    textarea{
        resize: none;
    }
</style>
@section('content')
<div class="container-fluid m-3 shadow-lg w-50 ">
    {{-- affichage de message --}}
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif

    <h3 class="mb-4">{{ isset($bien->id) ? 'Modifier le bien' : 'Créer un nouveau bien' }}</h3>
    <form action="" method="POST" enctype="multipart/form-data " >
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">

                @error('titre')
                {{$message}}
                @enderror

                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{old('titre',$bien->titre ??'')}}" required>
            </div>

            <div class="col-md-4">
                @error('surface')
                {{$message}}
                @enderror
                
                <label for="surface" class="form-label">Surface</label>
                <input type="text" class="form-control" id="surface" name="surface" value="{{old('surface',$bien->surface ??'')}}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                @error('prix')
                {{$message}}
                @enderror
                
                <label for="prix" class="form-label">Prix</label>
                <input type="text" class="form-control" id="prix" name="prix" value="{{old('prix',$bien->prix ??'')}}"  required>
            </div>

            <div class="col-md-4">
                @error('adresse')
                {{$message}}
                @enderror
                
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value="{{old('adresse',$bien->adresse ??'')}}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                @error('ville')
                {{$message}}
                @enderror
                
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville"  value="{{old('ville',$bien->ville ??'')}}" required>
            </div>

            <div class="col-md-4">
                @error('code_postal')
                {{$message}}
                @enderror
                
                <label for="code_postal" class="form-label">Code Postal</label>
                <input type="number" class="form-control" id="code_postal" name="code_postal" value="{{old('code_postal',$bien->code_postal ??'')}}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                @error('chambre')
                {{$message}}
                @enderror
                
                <label for="chambre" class="form-label">Nombre de chambres</label>
                <input type="text" class="form-control" id="chambre" name="chambre" value="{{old('chambre',$bien->chambre ??'')}}" required>
            </div>

            <div class="col-md-4">
                @error('etage')
                    {{$message}}
                @enderror
                <label for="etage" class="form-label">Étage</label>
                <input type="text" class="form-control" id="etage" name="etage" value="{{old('etage',$bien->etage ??'')}}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                @error('piece')
                {{$message}}
                @enderror
                
                <label for="piece" class="form-label">Nombre de pièces</label>
                <input type="text" class="form-control" id="piece" name="piece" value="{{old('piece',$bien->piece ??'')}}" required>
            </div>
            <div class=" col-md-4">
                @error('photo')
                {{$message}}
                @enderror
                
                <label for="photos" class="form-label">Ajouter des photos</label>
                <input class="form-control" type="file" id="images" name="images[]" multiple>
                <div class="form-text">Vous pouvez sélectionner plusieurs fichiers à la fois.</div>
            </div>
            
        </div>
        {{-- afficher les image lors de l'edition --}}
        @if (($bien->id!==null && $bien->images->isNotEmpty()))
            <div class="form-group">
                <label>Image actuelle</label>
                @foreach ($bien->images as $image)
                <div class="col-md-3">
                    <div class="card">
                        <img src="" class="card-img-top" alt="Image du bien">
                        <div class="card-body text-center">
                            <form action="{{ route('bien.supprimer_image', ['id' => $image->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        @endif

        <div class="row mb-3">
            <div class="col-md-4">
                @error('description')
                {{$message}}
                @enderror
                
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{old('description',$bien->description ??'')}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Switch pour savoir si le bien est vendu -->
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="est_vendu" name="est_vendu">
                <label class="form-check-label" for="est_vendu">Le bien est-il vendu ?</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            {{ isset($bien->id) ? 'Modifier' : 'Ajouter' }}
        </button>
    </form>
</div>
@endsection