<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reimbursement;

class StatusReimbursement extends Model
{
    use HasFactory;
    protected $table = 'status_reimbursement';
    public function reimbursement(){
        return $this->hasMany(Reimbursement::class,'status','id');   
    }
}
