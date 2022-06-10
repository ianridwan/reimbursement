<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    public function index(){
        $userlist = User::all();
        $pesan = Session::get('pesan');
        $user = Auth::user();
        if(empty($user)){
            return redirect('/')->with('pesan','Anda belum Login atau Session habis');
        }
        return view('/user/user',['userlist'=>$userlist,'pesan'=>$pesan,'users'=>$user]);
    }
    public function user_add(){ 
        $array_role = array('admin'=>'Admin','manager'=>'Manager','user'=>'User');
        $user = Auth::user();
        if(empty($user)){
            return redirect('/')->with('pesan','Anda belum Login atau Session habis');
        }
        return view('/user/user-add',['array_role'=>$array_role,'users'=>$user]);
    }
    public function user_save(Request $request){
        $user = Auth::user();
        if(empty($user)){
            return redirect('/')->with('pesan','Anda belum Login atau Session habis');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        if($user->save()){
            $pesan = "Account User Anda Telah dibuat, Silahkan Login";
        }else{
            $pesan = "Gagal Membuat Account User";
        }
        return redirect('/user')->with('pesan',$pesan);
    }
    public function user_delete(Request $request){
        $user = Auth::user();
        if(empty($user)){
            return redirect('/')->with('pesan','Anda belum Login atau Session habis');
        }
        $userdata = User::where('id',$request->id)->first();
        if($userdata->delete()){
            $flag = "deleted";
        }else{
            $flag = "error";
        }
        return redirect('/user')->with('pesan',$flag);
    }
    public function user_edit($id){
        $user = Auth::user();
        if(empty($user)){
            return redirect('/')->with('pesan','Anda belum Login atau Session habis');
        }
        $userdata = User::where('id',$id)->first();
        $array_role = array('admin'=>'Admin','manage'=>'Manage','user'=>'User');
        return view('/user/user-edit',['userdata'=>$userdata,'array_role'=>$array_role,'users'=>$user]);
    }
    public function user_update(Request $request){
        $request->validate([
            'name'=> 'required|max:255',
            'email'=>'required',
            'role'=>'required',
        ]);
      
        $userdata = User::where('id',$request->id)->first();
        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->role = $request->role;
       
        if($userdata->save()){
            $flag = "updated";
        }else{
            $flag = "Error";
        }
        return redirect('/user')->with('pesan', $flag);
    }
}
