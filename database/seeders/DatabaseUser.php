<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DatabaseUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'id' => 1,
            'name' => 'Ridwan',
            'email' => 'ian.ridwan90@gmail.com',
            'password' => bcrypt('123'),
            'created_at' => date("Y-m-d H:i:s"),
            'role' =>'user'
            ],
            [
                'id' => 2,
                'name' => 'ian',
                'email' => 'ridwan.ridwan@pegadaian.co.id',
                'password' => bcrypt('123'),
                'created_at' => date("Y-m-d H:i:s"),
                'role' =>'manager'
            ],
            [
                'id' => 3,
                'name' => 'yuli',
                'email' => 'yuli@gmail.com',
                'password' => bcrypt('123'),
                'created_at' => date("Y-m-d H:i:s"),
                'role' =>'admin'
            ]
        ]);    
    }
}
