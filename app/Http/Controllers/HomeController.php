<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();
        if(isset($user) && $user->count() ==0 ){
            return redirect('/')->with('pesan','Anda belum Login atau Session habis');
        }
        return view('/home',['users'=>$user]);
    }
}
