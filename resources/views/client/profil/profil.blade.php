<!-- resources/views/profile/show.blade.php -->

@extends('client.baseClient.app')

@section('content')
<div class="container mt-5">
    <h2>Mon Profil</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><strong>Numéro de téléphone :</strong> {{ $user->phone ?? 'Non renseigné' }}</p>
            <p><strong>Adresse :</strong> {{ $user->address ?? 'Non renseignée' }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Modifier mon profil</a>
        </div>
    </div>
</div>
@endsection
