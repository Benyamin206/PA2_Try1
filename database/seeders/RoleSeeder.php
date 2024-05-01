<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert('insert into roles (id, name) values (?, ?)', [1, 'penumpang']);
        DB::insert('insert into roles (id, name) values (?, ?)', [2, 'admin']);
        DB::insert('insert into roles (id, name) values (?, ?)', [3, 'pemilik_kapal']);
    }
    

}
