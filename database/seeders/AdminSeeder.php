<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            [
                'nama_petugas' => 'Admin',
                'username' => 'adminnn',
                'password' => Hash::make('password'),
                'telp' =>  '08534234324',
                'level' => 'admin'
            ],
            [
                'nama_petugas' => 'Petugas',
                'username' => 'petugass',
                'password' => Hash::make('password'),
                'telp' =>  '08536565465',
                'level' => 'petugas'
            ]
        ]);
    }
}
