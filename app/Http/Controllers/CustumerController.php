<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;
use App\Models\BienAttente;

class CustumerController extends Controller
{
    public function homepage (){
        return view('client.homepage.home');
    }


    public function afficher_biens()
    {
        $biens = Bien::latest()->take(6)->get();

        return view('client.trouver_bien.trouver_bien', ['biens'=>$biens]);
    }
    public function detailler_bien($id)
    {
        // Récupérer le bien correspondant à l'ID
        $bien = Bien::findOrFail($id);
        // Passer le bien à la vue des détails
        return view('client.trouver_bien.detail_bien', ['bien'=>$bien]);
    }

    public function contacter_form(){
        return view('client.contacter.contacter');
    }
    
    public function contacter(Request $request)  {
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'numero' => 'required|string|min:10',
            'message' => 'required|string',
            'images.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,docx|max:2048', //2MB
        ]);
      $interest=  BienAttente::create([
            'nom'=>$request['name'],
            'email'=>$request['email'],
            'numero'=>$request['numero'],
            'message'=>$request['message'],
            'images'=>$request['images']
        ]);
        dd($interest);
        return back()->with('success', 'Votre message a été envoyé avec succès!');
    }
    }

    
}
