<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{

    public function showLoginForm(){
        return view('admin.showLoginForm');
    }
    
    public function login(AuthAdminRequest $request){
        $credentials= $request->only('numero','password');

            if(! Auth::attempt($credentials)){
                return back()->withErrors(['les informations ne sont pas correctes']);

            }
            $request->session()->regenerate();
            if(Auth::user()->role === 'administrateur'){
                return redirect()->route('bien.lister_form')->with('success','Vous etes connecte');
            } elseif(Auth::user()->role === 'user'){
                return redirect()->route('custumer.welcome')->with('success','Vous etes connecte');
            }
        return back()->withErrors(['les informations ne sont pas correctes']);
    }
}
