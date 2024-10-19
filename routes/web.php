<?php

use App\Http\Controllers\AddUserController;
use App\Http\Controllers\AdminAuthController ;
use App\Http\Controllers\GestionBienController;
use App\Http\Controllers\ListOptionController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CustumerController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*************AUTHENTIFICATION********////

//AUTENTIFICATION DE L'USER
Route::prefix('/user-login')->controller(UserAuthController::class)->name('adminlogin')->group(function(){

    Route::get('/','showLoginForm')->name('showLoginForm');
    Route::post('/','login')->name('login_user');

});

//A D M I N I S T R A T I O N////// ///
//AJOUTER OPTION ///
Route::prefix('/gerer-options')->controller(ListOptionController::class)->name('option.')->group(function(){
    Route::get('/','OptionForm')->name('addOption');
    Route::post('/','OptionAction')->name('addOption');
    Route::get('/{option}/supprimer','supprimer_option')->name('supprimer_option');
});

// GESTION DES BIENS
Route::prefix('/gerer-biens')->controller(GestionBienController::class)->name('bien.')->group(function() {
    Route::get('/', 'afficher_formulaire')->name('afficher_formulaire'); 
    Route::post('/', 'creer_bien')->name('creer_bien');
    
    Route::get('/{bien}/editer', 'afficher_formulaire')->name('editer_formulaire');
    Route::post('/{bien}/editer', 'editer')->name('editer_action');

    Route::get('/liste-des-biens', 'lister_biens')->name('lister_Form');
    Route::get('/{bien}/supprimer-bien', 'supprimer_bien')->name('supprimer_bien');

});


// *********** C  L  I  E  N  T  *****************//
// CLIENT
Route::prefix('/custumer')->controller(CustumerController::class)->name('custumer.')->group(function(){
    Route::get('/homepage', 'homepage')->name('welcome');
    Route::get('/les-biens','afficher_biens')->name('affichers_biens');
    Route::get('/{bien}/details','detailler_bien')->name('detailler_bien');
    Route::get('/nous-contacter','contacter_form')->name('contacter_form');
    route::post('/nous-contacter','contacter')->name('contacter_form');
});

Route::prefix('/custumer')->controller(ProfilController::class)->name('custumer.')->group(function(){
Route:: get('/profile','show_profil')->name('show_profil');
});

Route::prefix('/inscrire')->controller(AddUserController::class)->group(function(){
    Route:: get('/','inscrire')->name('inscription');
    Route:: post('/','inscrire')->name('inscription');
    });



