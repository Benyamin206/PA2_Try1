<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert('insert into rutes (id, lokasi_berangkat, lokasi_tujuan, aktif) values (?, ?, ?, ?)', [1, 'Ajibata', 'Tomok', 0]);
        DB::insert('insert into rutes (id, lokasi_berangkat, lokasi_tujuan, aktif) values (?, ?, ?, ?)', [2, 'Tomok', 'Ajibata', 0]);
    }
}
