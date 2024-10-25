<!-- resources/views/profile/edit.blade.php -->

@extends('base.baseClient.app')

@section('content')
<div class="container mt-5">
    <h2>Modifier le Profil</h2>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Adresse Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="phone">Numéro de téléphone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="form-group mb-3">
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $user->address) }}">
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </div>
    </form>
</div>
@endsection
