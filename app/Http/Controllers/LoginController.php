<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //untuk insert user ke table
    public function submit_user(Request $request) 
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'file' => 'required',
        ]);
        
        $users = new User;
        $users->name = $request->username;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->role = 'user';
        $users->file = $request->file;
        $users->save();
        
        return redirect("/user");
    }
    //end untuk insert user ke table
    
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
            $pesan = "Sukses";
        }else{
            $pesan = "Gagal";
        }
        return view('/auth/register',['pesan'=>$pesan]);

    }

}