<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListOptionRequest;
use Illuminate\Http\Request;
use App\Models\ListOption;

class ListOptionController extends Controller
{
    public function OptionForm() {
        // Affiche le formulaire avec les options existantes
        $all_options = ListOption::all();
        return view('admin.gestion_option.Option', ['all_options' => $all_options]);
    }

    public function OptionAction(ListOptionRequest $request) {
        // Crée une nouvelle option
        ListOption::create($request->validated());

        // Récupère toutes les options


        // Redirige avec un message de succès
        return redirect()->route('option.addOption')->with([
            'success' => 'Une nouvelle option a été insérée avec succès',

        ]);
    }
   public function supprimer_option(ListOption $option){
    $option->delete();
    return redirect()->route('option.addOption')->with('success', "Option supprimé avec succès !");
   }
}
