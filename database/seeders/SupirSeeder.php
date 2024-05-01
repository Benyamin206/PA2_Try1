<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SupirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert('insert into supirs (id, name, nomor_hp, jenis_kelamin, alamat, aktif) values (?, ?, ?, ?, ?, ?)', [1, 'Bayu', '5454', 'Pria', 'Medan', 0]);
        DB::insert('insert into supirs (id, name, nomor_hp, jenis_kelamin, alamat, aktif) values (?, ?, ?, ?, ?, ?)', [2, 'Cayu', '523454', 'Wanita', 'Medan', 0]);
    }
}
