<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password' => ['required'],        
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/')->with('user');
        }
        return back()->withErrors([
            'email'=> 'The provied credentials do not match our records',
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function index(){
        $user=Auth::user();
        return view('/auth/login',['user'=>$user]);
    }
    public function register(){
        return view('/auth/register');
    }

    public function register_save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($user->save()){
            $pesan = "Account User Anda Telah dibuat, Silahkan Login";
        }else{
            $pesan = "Gagal Membuat Account User";
        }
        return view('/auth/register',['pesan'=>$pesan]);

    }

}