<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\models\Reimbursement;
use App\Models\JenisReimbursement;
use App\Http\Controllers\HomeController;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReimbursementController extends Controller
{
    public function index(){
        
        $pesan = Session::get('pesan');
        $user = Auth::user();
        if(isset($user) && $user->count() ==0 ){
            return redirect('/')->with('pesan','Anda belum Login atau Session habis');
        }
        if(Gate::allows('isAdmin')){
            $reimbursementlist = Reimbursement::all();
        }elseif(Gate::allows('isManager')){
            $reimbursementlist = Reimbursement::where('status','=',1)->orwhere('user_id','=',$user->id)->get();
        }else{
            $reimbursementlist = Reimbursement::where('user_id','=',$user->id)->get();
        }
        
        return view('/reimbursement/reimbursement',['reimbursementlist'=>$reimbursementlist,'pesan'=>$pesan,'users'=>$user]);
    }

    public function reimbursement_add(){ 
        $jenisreimbursement = JenisReimbursement::all();
        $user = Auth::user();
        if(isset($user) && $user->count() ==0 ){
            return redirect('/')->with('pesan','Anda belum Login atau Session habis');
        }
        return view('/reimbursement/reimbursement-add',['jenisreimbursement'=>$jenisreimbursement,'users'=>$user]);
    }
    public function reimbursement_save(Request $request){ 
        if($request->jenis_pengajuan=='1'){
            $request->validate([
                'nama_pengajuan' => 'required',
                'jenis_pengajuan' => 'required',
                'nilai' => 'required',
                'klien' =>'required',
                'alasan'=>'required',
                'bukti' =>'required',
                ]);
        }elseif($request->jenis_pengajuan=='2'){
            $request->validate([
                'nama_pengajuan' => 'required',
                'jenis_pengajuan' => 'required',
                'nilai' => 'required',
                'alasan'=>'required',
                'bukti' =>'required',
                ]);
        }else{
            $request->validate([
                'nama_pengajuan' => 'required',
                'jenis_pengajuan' => 'required',
                'nilai' => 'required',
                'bukti' =>'required',
                ]);
        }
       
            $reimbursement = new Reimbursement;
            $reimbursement->nama_pengajuan = $request->nama_pengajuan;
            $reimbursement->jenis_pengajuan = $request->jenis_pengajuan;
            $reimbursement->nilai = $request->nilai;
            $reimbursement->status = 1;
            if($request->jenis_pengajuan==1){
                $reimbursement->klien = $request->klien;
            }
            $reimbursement->klien = '';
            $reimbursement->alasan = $request->alasan;
            $reimbursement->user_id = Auth::user()->id;
            $file = $request->file('bukti');
            $tujuan_upload = 'upload_file';
            $file->move($tujuan_upload,$file->getClientOriginalName());
            $reimbursement->bukti = $tujuan_upload."/".$file->getClientOriginalName();
        
          
        if($reimbursement->save()){
            $flag = "saved";
        }else{
            $flag = "error";
        }
           
        return redirect('/reimbursement')->with('pesan', $flag);
    }
    public function reimbursement_process(Request $request){
       
        $reimbursement = Reimbursement::where('id',$request->id)->first();
        $reimbursement->status = $request->status;
        if($reimbursement->save()){
            if($request->status==2){
                $flag = "Anda Telah Menyetujui Pengajuan Reimbursement";
            }elseif($request->status==3){
                $flag = "Anda Telah Menolak Pengajuan Reimbursement";
            }elseif($request->status==4){
                $flag = "Anda Telah Menyetujui Pengajuan Reimbursement";
            }elseif($request->status==5){
                $flag = "Anda Telah Menyetujui Pengajuan Reimbursement dan Melakukan Pembayaran";
            }
        }else{
            $flag = "Error";
        }
        return redirect('/reimbursement')->with('pesan', $flag);
    }
    public function reimbursement_edit($id){
        $user = Auth::user();
        if(isset($user) && $user->count() ==0 ){
            return redirect('/')->with('pesan','Anda belum Login atau Session habis');
        }
        $reimbursementdata = Reimbursement::where('id',$id)->first();
        $jenisreimbursement = JenisReimbursement::all();
        return view('/reimbursement/reimbursement-edit',['jenisreimbursement'=>$jenisreimbursement,'reimbursement'=>$reimbursementdata,'users'=>$user]);
    }
    public function reimbursement_update(Request $request){
        if($request->jenis_pengajuan=='1'){
            $request->validate([
                'nama_pengajuan' => 'required',
                'jenis_pengajuan' => 'required',
                'nilai' => 'required',
                'klien' =>'required',
                'alasan'=>'required',
                ]);
        }elseif($request->jenis_pengajuan=='2'){
            $request->validate([
                'nama_pengajuan' => 'required',
                'jenis_pengajuan' => 'required',
                'nilai' => 'required',
                'alasan'=>'required',
                ]);
        }else{
            $request->validate([
                'nama_pengajuan' => 'required',
                'jenis_pengajuan' => 'required',
                'nilai' => 'required',
                ]);
        }
      
        $reimbursementdata = Reimbursement::where('id',$request->id)->first();
        $reimbursementdata->nama_pengajuan = $request->nama_pengajuan;
        $reimbursementdata->jenis_pengajuan = $request->jenis_pengajuan;
        $reimbursementdata->alasan = $request->alasan;
        $reimbursementdata->nilai = $request->nilai;
        //$reimbursementdata->klien = $request->klien;
        if($request->jenis_pengajuan=='1'){
            $reimbursementdata->klien = $request->klien;
        }else{
            $reimbursementdata->klien = '';
        }
       
        if($reimbursementdata->save()){
            $flag = "updated";
        }else{
            $flag = "Error";
        }
        return redirect('/reimbursement')->with('pesan', $flag);
    }
    public function reimbursement_delete(Request $request){
        $user = Auth::user();
        if(isset($user) && $user->count() ==0 ){
            return redirect('/')->with('pesan','Anda belum Login atau Session habis');
        }
        $reimbursementdata = Reimbursement::where('id',$request->id)->first();
        if($reimbursementdata->delete()){
            $flag = "deleted";
        }else{
            $flag = "error";
        }
        return redirect('/reimbursement')->with('pesan',$flag);
    }
    
}
