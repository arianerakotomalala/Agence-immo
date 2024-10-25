<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    // Afficher le profil de l'utilisateur
    public function show_profil()
    {
        $user = Auth::user(); // Récupère l'utilisateur connecté
        return view('client.profil.profil', compact('user'));
    }

    // Afficher le formulaire d'édition du profil
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Mettre à jour les informations du profil
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Mettre à jour l'utilisateur authentifié
        $user = Auth::user();
        $user->update($request->all());

        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès.');
    }

}
