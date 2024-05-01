<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\PemesananJadwal;
use App\Models\Muatan;
use App\Models\Jadwal;
use Illuminate\Support\Carbon;
use DateTimeZone;




class MidtransController extends Controller
{
    //

    public function checkOrderStatus()
    {
        $client = new \GuzzleHttp\Client();
    
        $orderIds = [];
    
        $orders =  PemesananJadwal::all();
    
        foreach($orders as $o){
            $orderIds[] = $o->id;
        }
    
        $transactions = [];
    
        foreach ($orderIds as $orderId) {
            $response = $client->request('GET', 'https://api.sandbox.midtrans.com/v2/' . $orderId . '/status', [
                'headers' => [
                    'accept' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode('SB-Mid-server-r7MhU_nxELBt_mWd6J38SZX4:'),
                ],
            ]);
    
            $data = json_decode($response->getBody(), true);
            
            // Periksa apakah transaksi memiliki order_id sebelum menambahkannya
            if(isset($data['order_id'])) {
                $transactions[] = $data;
            }
        }
    
        return view('Midtrans.status', ['transactions' => $transactions]);
    }


    public function checkOrderStatusSp($orderId){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.sandbox.midtrans.com/v2/' . $orderId . '/status', [
            'headers' => [
                'accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode('SB-Mid-server-r7MhU_nxELBt_mWd6J38SZX4:'),
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return view('Midtrans.status_jadwal_pay',compact('data'));

    }


// lingkup 10 menit dan tidak terdaftar di API
// terdaftar di API dan status settlement atau pending
    public function stok($idJadwal){
        // $jadwal = Jadwal::find($idJadwal);

        $orders = PemesananJadwal::where('jadwal_id', $idJadwal)->get();
        $orderIds = [];
        foreach($orders as $o){
            $orderIds[] = $o->id;
        }

        foreach ($orderIds as $orderId) {
            $response = $client->request('GET', 'https://api.sandbox.midtrans.com/v2/' . $orderId . '/status', [
                'headers' => [
                    'accept' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode('SB-Mid-server-r7MhU_nxELBt_mWd6J38SZX4:'),
                ],
            ]);
    
            $data = json_decode($response->getBody(), true);
            
            // Periksa apakah transaksi memiliki order_id sebelum menambahkannya
            if(isset($data['order_id'])) {
                $transactions[] = $data;
            }
        }


        return view('Midtrans.stok', compact('orders'));
    }


    public function lihatJadwal($jadwalId){
        $jadwal = Jadwal::findOrFail($jadwalId);
        $pemesananJadwal = PemesananJadwal::where('jadwal_id', $jadwalId)->get();

        $transactions = [];

        foreach ($pemesananJadwal as $pemesanan) {
            $orderId = $pemesanan->id; // Misalnya, gunakan ID pemesanan sebagai orderId
        
            // API untuk mendapatkan status transaksi dari Midtrans
            $client = new Client();
            $response = $client->request('GET', 'https://api.sandbox.midtrans.com/v2/' . $orderId . '/status', [
                'headers' => [
                    'accept' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode('SB-Mid-server-r7MhU_nxELBt_mWd6J38SZX4:'),
                ],
            ]);
        
            // Decode response dari API Midtrans
            $data = json_decode($response->getBody(), true);
        
            // Cek apakah status_code adalah 404, jika ya, lanjut ke iterasi berikutnya
            // if ((isset($data['status_code']) && $data['status_code'] != 404) || (isset($data['status_code']) && $data['status_code'] != 407 )) {
            // // Tambahkan data transaksi ke dalam array transactions
            //     $transactions[] = $data;
            // }

            if ((isset($data['status_code']) && ($data['status_code'] == 200 || $data['status_code'] == 201))) {
                $transactions[] = $data;
            }
        
            // Ambil semua muatan yang aktif
            $muatan = Muatan::where('aktif', true)->get();

                // Buat array untuk menampung stok muatan
            $stokMuatan = [];

                // Loop untuk mengisi stok muatan dari tabel muatan
            foreach ($muatan as $item) {
                $stokMuatan[$item->id] = $item->maksimal;
            }

        //     @php
        //     $now = \Illuminate\Support\Carbon::now(new DateTimeZone('Asia/Jakarta'));
        //     $now2 = strtotime($now);
        //     $waktuBerangkat = \Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $j->waktu_berangkat);
        //     $waktuBerangkat2 = strtotime($waktuBerangkat);
        // @endphp
        // @if ($now2 > $waktuBerangkat2)

            foreach ($pemesananJadwal as $pemesanan) {

                // Pengurangan stok untuk pemesanan jadwal yang berstatus 404 di hasil API Midtrans
                $now = \Illuminate\Support\Carbon::now(new DateTimeZone('Asia/Jakarta'));
                $ditambahkanTime = \Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $pemesanan->ditambahkan_pada);
                $selisihWaktu = strtotime($now) - strtotime($ditambahkanTime);
                if($selisihWaktu < 600 && !in_array($pemesanan->id, array_column($transactions, 'order_id'))){
                    foreach ($pemesanan->detail_pesan_jadwal as $detail) {
                        $stokMuatan[$detail->muatan_id] -= $detail->jumlah;
                    }
                }
            

                // Pengurangan stok untuk pemesanan jadwal yang berstatus pending di hasil API Midtrans
                foreach ($transactions as $transaction) {
                    if(isset($transaction['transaction_status'])){
                        if ( $transaction['transaction_status'] === 'pending' && $transaction['order_id'] === $pemesanan->id) {
                            foreach ($pemesanan->detail_pesan_jadwal as $detail) {
                                $stokMuatan[$detail->muatan_id] -= $detail->jumlah;
                            }
                        }
                    }
                }


                // Pengurangan stok untuk pemesanan jadwal yang berstatus Paid di database
                if($pemesanan->status_pembayaran == "Paid"){
                    foreach($pemesanan->detail_pesan_jadwal as $detail){
                        $stokMuatan[$detail->muatan_id] -= $detail->jumlah;
                    }
                }
            }

            
        }
        
        if(!isset($stokMuatan)){
                        // Ambil semua muatan yang aktif
                    $muatan = Muatan::where('aktif', true)->get();

                        // Buat array untuk menampung stok muatan
                    $stokMuatan = [];
        
                        // Loop untuk mengisi stok muatan dari tabel muatan
                    foreach ($muatan as $item) {
                        $stokMuatan[$item->id] = $item->maksimal;
                    }
        }

        return view('Midtrans.lihatjadwal', compact('jadwal', 'pemesananJadwal', 'transactions', 'stokMuatan'));
        // return view('Midtrans.lihatjadwal', compact('jadwal', 'pemesananJadwal', 'transactions'));
    }


    public function detail_stok_validasi($jadwalId)
    {
        $jadwal = Jadwal::findOrFail($jadwalId);
        $pemesananJadwal = PemesananJadwal::where('jadwal_id', $jadwalId)->get();
    
        $transactions = [];
        $stokMuatan = []; // Array untuk menyimpan sisa muatan
    
        foreach ($pemesananJadwal as $pemesanan) {
            $orderId = $pemesanan->id; 
            
            $client = new Client();
            $response = $client->request('GET', 'https://api.sandbox.midtrans.com/v2/' . $orderId . '/status', [
                'headers' => [
                    'accept' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode('SB-Mid-server-r7MhU_nxELBt_mWd6J38SZX4:'),
                ],
            ]);
            
            // Decode response dari API Midtrans
            $data = json_decode($response->getBody(), true);
    
            if ((isset($data['status_code']) && ($data['status_code'] == 200 || $data['status_code'] == 201))) {
                $transactions[] = $data;
            }
    
            // Ambil semua muatan yang aktif
            $muatan = Muatan::where('aktif', true)->get();
    
            // Loop untuk mengisi stok muatan dari tabel muatan
            foreach ($muatan as $item) {
                $stokMuatan[$item->id] = $item->maksimal; // Inisialisasi sisa muatan
            }
    
            foreach ($pemesananJadwal as $pemesanan) {
                // Pengurangan stok untuk pemesanan jadwal yang berstatus 404 di hasil API Midtrans
                $now = \Illuminate\Support\Carbon::now(new DateTimeZone('Asia/Jakarta'));
                $ditambahkanTime = \Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $pemesanan->ditambahkan_pada);
                $selisihWaktu = strtotime($now) - strtotime($ditambahkanTime);
                if ($selisihWaktu < 600 && !in_array($pemesanan->id, array_column($transactions, 'order_id'))) {
                    foreach ($pemesanan->detail_pesan_jadwal as $detail) {
                        // Kurangi sisa muatan
                        $stokMuatan[$detail->muatan_id] -= $detail->jumlah;
                    }
                }
    
                // Pengurangan stok untuk pemesanan jadwal yang berstatus pending di hasil API Midtrans
                foreach ($transactions as $transaction) {
                    if (isset($transaction['transaction_status'])) {
                        if ($transaction['transaction_status'] === 'pending' && $transaction['order_id'] === $pemesanan->id) {
                            foreach ($pemesanan->detail_pesan_jadwal as $detail) {
                                // Kurangi sisa muatan
                                $stokMuatan[$detail->muatan_id] -= $detail->jumlah;
                            }
                        }
                    }
                }
    
                // Pengurangan stok untuk pemesanan jadwal yang berstatus Paid di database
                if ($pemesanan->status_pembayaran == "Paid") {
                    foreach ($pemesanan->detail_pesan_jadwal as $detail) {
                        // Kurangi sisa muatan
                        $stokMuatan[$detail->muatan_id] -= $detail->jumlah;
                    }
                }
            }
        }
    
        // Inisialisasi sisa muatan untuk muatan yang tidak digunakan pada pemesanan
        if (empty($stokMuatan)) {
            $muatan = Muatan::where('aktif', true)->get();
            foreach ($muatan as $item) {
                $stokMuatan[$item->id] = $item->maksimal;
            }
        }
    
        return $stokMuatan;
    }

    public function cek_muatan_validasi($idJadwal){
        $stokMuatan = $this->detail_stok_validasi($idJadwal);
        return view('Midtrans.cek_muatan_validasi', compact('stokMuatan'));
    }
    

}
