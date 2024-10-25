<?php

namespace App\Http\Controllers;
use App\Models\Bien;
use App\Http\Requests\BienRequest;
use App\Models\Images;
use Illuminate\Http\UploadedFile;

class GestionBienController extends Controller
{
    //show the form que ce soit editer ou creer
    public function afficher_formulaire(Bien $bien=null){
        return view('admin.gestion_biens.bien',['bien'=>$bien?:new Bien()]);
    }
    

    //create a new property
    public function creer_bien(BienRequest $request)
    {
        $data = $request->validated();
        $data['est_vendu'] = $request->has('est_vendu');
        //images
        $bien=Bien::create($data);
         
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Générer un nom unique pour chaque image
                $filename = time() . '-' . $image->getClientOriginalName();
        
                // Sauvegarder l'image dans le dossier public/images
                $path = $image->storeAs('public/images', $filename);
        
                // Associer l'image au bien via la relation
                $bien->images()->create([
                    'path' => $filename, // Sauvegarder uniquement le nom du fichier ou le chemin complet selon le besoin
                ]);
            }
        }
        // Rediriger avec un message de succès
        return redirect()->route('bien.afficher_formulaire')->with(['success' => 'Une nouvelle option a été insérée avec succès',]);
    }


    //list all property
    public function lister_biens(){
       $liste_biens= Bien::all();
       return view('admin.gestion_biens.liste')->with(['liste_biens'=>$liste_biens]);
    }



    public function editer(BienRequest $request, Bien $bien) {
        // Valider les données
        $data = $request->validated();
        // Mettre à jour le bien avec les données validées
        $bien->update($data);
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = time() . '-' . $image->getClientOriginalName();
                    $image->storeAs('public/images', $filename);
    
                    // Ajouter les nouvelles images au bien
                    $bien->images()->create(['path' => $filename]);
                }
            }
        // Rediriger avec un message de succès
        return redirect()->route('bien.editer_formulaire',['bien'=>$bien])->with('success', "Données modifiées avec succès !");
    }

    //supprimer un bien 
    public function supprimer_bien(Bien $bien){
        $bien->delete();
        return redirect()->route('bien.lister_Form')->with('success', "Le bien a été supprimé avec succès !");
    }
    
}

