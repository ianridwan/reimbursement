<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password' => ['required'],        
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/home');
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
        $pesan = Session::get('pesan');
        $user=Auth::user();
        if(isset($user) && $user !=''){
            return view('/home',['users'=>$user]);
            // $pesan=$user;
        }else{
            return view('/auth/login',['users'=>$user,'pesan'=>$pesan]);
        }
        
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