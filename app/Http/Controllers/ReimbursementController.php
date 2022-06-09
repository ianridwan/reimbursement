<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\models\Reimbursement;

class ReimbursementController extends Controller
{
    public function index(){
        $reimbursementlist = Reimbursement::all();
        return view('/reimbursement/reimbursement',['reimbursementlist'=>$reimbursementlist]);
    }

    public function reimbursement_add(){ 
        return view('/reimbursement/reimbursement-add');
    }
    
}
