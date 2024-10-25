
@extends('client.baseClient ')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Nous Contacter</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Proposer un bien ou contacter l'agence</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Adresse Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Numéro de téléphone</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="message">Votre message</label>
                            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="files">Attacher des fichiers (images, documents)</label>
                            <input type="file" name="files[]" id="files" class="form-control" multiple>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
