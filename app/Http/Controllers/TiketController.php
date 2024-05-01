<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananJadwal;



class TiketController extends Controller
{
    //

    public function invoice($id){
        // $order = PemesananJadwal::find($id);
        $order = PemesananJadwal::with('detail_pesan_jadwal', 'user', 'jadwal')->find($id);
        return view('Tiket.tiket', compact('order'));
    }
}
