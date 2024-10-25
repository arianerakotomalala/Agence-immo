<?php
namespace App\Http\Controllers;

use App\Http\Requests\AuthAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    public function inscrire(){
        $data = [
            'name' => 'custumer1',
            'email' => 'customer@custumer.custumer',
            'numero' => '1234567890',
            'password' => Hash::make('111')
        ];

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'numero' => $data['numero'],
            'password' => $data['password'] // Hash::make is applied earlier
        ]);

        dd($user);
        return view('admin.showLoginForm');
    }
}
