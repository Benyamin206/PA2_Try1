<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KapalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert('insert into kapals (id, nama, deskripsi, gambar, user_id, aktif, kapasitas, available_booking, booking) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [1, 'Rodame', 'Kapal sepuh', 'kapal1SeederImage', '3', '70', '0', '0']);

        DB::insert('insert into kapals (id, nama, deskripsi, gambar, user_id, aktif, kapasitas, available_booking, booking) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [2, 'Kapal Selam', 'Kapal selam danau', 'kapal2SeederImage', '3', '70', '0', '0']);
        
    }
}
