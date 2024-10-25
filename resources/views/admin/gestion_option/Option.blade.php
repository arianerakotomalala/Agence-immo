@extends('admin.gestion_option.baseOption')
<style>
    .delete-link {
        background-color: rgb(243, 11, 11);
        text-decoration: none;
        color: white;
        padding: 5px;
        border-radius: 5px
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <!-- Liste des options -->
        <div class="col-md-6">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Liste des options avec style striped -->
            @if(isset($all_options) && $all_options->count())
            <table class="table table-striped  mt-5 shadow-lg">
                <thead>
                    <tr>
                        <th>Options</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_options as $option)
                        <tr>
                            <td>{{ $option->nom_option }}</td>
                            <td>
                                <!-- Formulaire pour la suppression avec une icône de croix -->
                                <form action="" method="post" style="display:inline;">
                                    @csrf
                                    <a href="{{route('option.supprimer_option',['option'=>$option->id])}}" class="delete-link" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?');">Supprimer</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>Aucune option disponible.</p>
            @endif
        </div>

        <!-- Formulaire d'ajout -->
        <div class="col-md-6 mt-5 ">
            <form action="" method="post">
                @csrf
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Ajouter une Option</h5>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nom_option" placeholder="Ajouter une option">
                        </div>
                        <button class="btn btn-primary mt-2 ms-5" type="submit">Ajouter aux options</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
