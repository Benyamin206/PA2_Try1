<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MuatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert('insert into muatans (id, nama, harga_per_item, maksimal, aktif) values (?, ?, ?, ?, ?)', [1, 'Orang Dewasa', '20000', '50', 0]);
        DB::insert('insert into muatans (id, nama, harga_per_item, maksimal, aktif) values (?, ?, ?, ?, ?)', [2, 'Anak-anak', '10000', '30', 0]);
        DB::insert('insert into muatans (id, nama, harga_per_item, maksimal, aktif) values (?, ?, ?, ?, ?)', [3, 'Kereta Besar', '25000', '5', 0]);
        DB::insert('insert into muatans (id, nama, harga_per_item, maksimal, aktif) values (?, ?, ?, ?, ?)', [4, 'Kereta Kecil', '21000', '7', 0]);

    }
}
