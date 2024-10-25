@extends('admin.gestion_option.baseOption')

<style>
    .edit-link, .delete-link {
        text-decoration: none;
        color: white;
        padding: 5px 5px;
        border-radius: 5px;
    }
    .edit-link {
        background-color: rgb(7, 231, 7);
    }
    .delete-link {
        background-color: red;
    }
</style>

@section('content')
@if (isset($liste_biens) && $liste_biens->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Le bien</th>
                <th>Prix</th>
                <th>Surface</th>
                <th>Ville</th>
                <th>Nombre de pièces</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($liste_biens as $bien)
                <tr>
                    <td>{{ $bien->titre }}</td>
                    <td>{{ $bien->prix }}</td>
                    <td>{{ $bien->surface }}</td>
                    <td>{{ $bien->ville }}</td>
                    <td>{{ $bien->piece }}</td>
                    <td>
                        <a href="{{ route('bien.editer_formulaire', ['bien' => $bien->id]) }}" class="edit-link">Éditer</a>
                        <a href="{{route('bien.supprimer_bien',['bien'=>$bien->id])}}" class="delete-link" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?');">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Aucun bien disponible pour le moment.</p>
@endif
@endsection


