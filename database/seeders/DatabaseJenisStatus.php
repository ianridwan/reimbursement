<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseJenisStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_reimbursement')->insert([
            [
            'id' => 1,
            'jenis_reimbursement' => 'Reimbursement Transportasi',
            'created_at' => date("Y-m-d H:i:s"),

            ],
            [
            'id' => 2,
            'jenis_reimbursement' => 'Biaya Kesehatan',
            'created_at' => date("Y-m-d H:i:s"),

            ]
        ]);    
    }
}
