<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\models\Reimbursement;
use App\Models\JenisReimbursement;
use Session;

class ReimbursementController extends Controller
{
    public function index(){
        $reimbursementlist = Reimbursement::all();
        $pesan = Session::get('pesan');
        return view('/reimbursement/reimbursement',['reimbursementlist'=>$reimbursementlist,'pesan'=>$pesan]);
    }

    public function reimbursement_add(){ 
        $jenisreimbursement = JenisReimbursement::all();
        return view('/reimbursement/reimbursement-add',['jenisreimbursement'=>$jenisreimbursement]);
    }
    public function reimbursement_save(Request $request){ 
        if($request->jenis_pengajuan==1){
            $request->validate([
                'nama_pengajuan' => 'required',
                'jenis_pengajuan' => 'required',
                'nilai' => 'required',
                'klien' =>'required',
                'alasan'=>'required',
                'bukti' =>'required',
                ]);
        }elseif($request->jenis_pengajuan==2){
            $request->validate([
                'nama_pengajuan' => 'required',
                'jenis_pengajuan' => 'required',
                'nilai' => 'required',
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
                $reimbursement->alasan = $request->alasan;
            }
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
    
}
