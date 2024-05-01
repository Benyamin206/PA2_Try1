<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Jadwal;
use App\Models\Rute;
use App\Models\Muatan;
use App\Models\Kapal;
use App\Models\Supir;
use App\Models\PemesananJadwal;
use App\Models\DetailPesanJadwal;
use DateTimeZone;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Midtrans;
use GuzzleHttp\Client;


class PesananController extends Controller
{
    //
    public function pesanan_jadwal_paid(){
        $user_id = Auth::id();

        $pesanans = PemesananJadwal::where('user_id', $user_id)->where('status_pembayaran', 'Paid')->get();

        return view('Pesanan.pesanan_jadwal', compact('pesanans'));
    }

    
}
