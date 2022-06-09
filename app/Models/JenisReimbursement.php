<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reimbursement;

class JenisReimbursement extends Model
{
    use HasFactory;
    protected $table = 'jenis_reimbursement';
    public function reimbursement(){
        return $this->hasMany(Reimbursement::class,'jenis_reimbursement','id');
    }
}
