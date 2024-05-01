<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Carbon;
use DateTimeZone;


class TryController extends Controller
{
    //

    public function filter_jadwal(){
        $jadwals = Jadwal::whereDate('waktu_berangkat', '2024-05-01')->get();
        return view('Try/index', compact('jadwals'));
    }

    public function home(){
        return view('Try.home2');
    }

    public function index_jadwal_penumpang_filter(Request $request){
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);
    
        $date = $request->date;

        if(!empty($date)){
            $Njadwals = Jadwal::with('rute', 'kapal', 'supir')->whereDate('waktu_berangkat', $date)->get();
        }else{
            $Njadwals = Jadwal::with('rute', 'kapal', 'supir')->get();
        }

        $jadwals = [];
    
        foreach($Njadwals as $j){
            $now = Carbon::now(new DateTimeZone('Asia/Jakarta'));
            $now2 = strtotime($now);
            $waktuBerangkat = \Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $j->waktu_berangkat);
            $waktuBerangkat2 = strtotime($waktuBerangkat) - 1800;

            if($waktuBerangkat2 > $now2){
                $jadwals[] = $j;
            }
        }
        return view('Pesan_Jadwal.index', compact('jadwals'));
        
    }
}

