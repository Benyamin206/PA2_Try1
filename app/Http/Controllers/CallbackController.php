<?php

namespace App\Http\Controllers;
use App\Models\PemesananJadwal;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    //

    public function callback(Request $request){
        $serverKey = 'SB-Mid-server-r7MhU_nxELBt_mWd6J38SZX4';
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
                $order = PemesananJadwal::find($request->order_id);
                $order->update(['status_pembayaran' => 'Paid']);
            }
        }
    }
    

}
