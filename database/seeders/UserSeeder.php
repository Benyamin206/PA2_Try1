<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hashedPassword1 = bcrypt('andy12345');
        $hashedPassword2 = bcrypt('admin12345');
        $hashedPassword3 = bcrypt('candra12345');
        //
        DB::insert('insert into users (id, name, email, role_id, nomor_telepon, jenis_kelamin, alamat, password) values (?, ?, ?, ?, ?, ?, ?, ?)',
         [1, 'Andy', 'andy@gmail.com', '1', '2328393298','Pria', 'Balige',$hashedPassword1]);

         DB::insert('insert into users (id, name, email, role_id, nomor_telepon, jenis_kelamin, alamat, password) values (?, ?, ?, ?, ?, ?, ?, ?)',
         [2, 'Admin', 'admin@gmail.com', '2', '2328393298','Pria', 'Balige',$hashedPassword2]);

         DB::insert('insert into users (id, name, email, role_id, nomor_telepon, jenis_kelamin, alamat, password) values (?, ?, ?, ?, ?, ?, ?, ?)',
         [3, 'Candra', 'candra@gmail.com', '3', '2328393298','Pria', 'Balige',$hashedPassword3]);
    }
}
