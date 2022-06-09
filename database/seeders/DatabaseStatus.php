<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_reimbursement')->insert([
            [
            'id' => 1,
            'status' => 'Request Reimbursement',
            'created_at' => date("Y-m-d H:i:s"),

            ],
            [
            'id' => 2,
            'status' => 'Approved Manager',
            'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 3,
                'status' => 'Rejected Manager',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 4,
                'status' => 'Approved Admin',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 5,
                'status' => 'Paid Reimbursement',
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ]); 
    }
}
