<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function login(Request $request){
       /*$user = User::get()->where('email', trim($request->email))->first();
        if($user){
            if($user->password == $request->password){
                Auth::login($user);
                return redirect()->route('task-list');
            }else{
                return redirect()->route('login')->with('error', 'Contraseña incorrecta');
            }
        }*/

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();

            return redirect()->intended('task-list');
        }else{
            return redirect('login');
        }
    }

    //Funcion para logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
