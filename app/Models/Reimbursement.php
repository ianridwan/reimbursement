<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisReimbursement;
use App\Models\StatusReimbursement;
use App\Models\User;

class Reimbursement extends Model
{
    use HasFactory;
    protected $table = 'reimbursement';
    public function jenis_reimbursement(){
        return $this->belongsTo(JenisReimbursement::class,'jenis_pengajuan','id');
    }
    public function status_reimbursement(){
        return $this->belongsTo(StatusReimbursement::class,'status','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
}
