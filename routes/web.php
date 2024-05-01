<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MuatanController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\PemilikKapalController;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\TryController;
use Illuminate\Support\Str;
use App\Http\Controllers\HomepageController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $a = 1;
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home2', [HomepageController::class, 'homeBL'])->name('homeBL');






// MIDDLEWARE ADMIN
Route::middleware(['admin'])->group(function(){
    // Tambah Pemilik Kapal
    Route::get('/tambah_pemilik_kapal', [App\Http\Controllers\AdminController::class, 'tambah_pemilik_kapal'])->name('tambah_pemilik_kapal');
    Route::post('/store_pemilik_kapal', [App\Http\Controllers\AdminController::class, 'store_pemilik_kapal'])->name('store_pemilik_kapal');
    Route::get('/index_pemilik_kapal', [App\Http\Controllers\AdminController::class, 'index_pemilik_kapal'])->name('index_pemilik_kapal');




    // ABOUT SUPIR 
    Route::get('/tambah_supir', [App\Http\Controllers\AdminController::class, 'tambah_supir'])->name('tambah_supir');
    Route::post('/tambah_supir', [App\Http\Controllers\AdminController::class, 'store_supir'])->name('store_supir');
    Route::get('/index_supir', [App\Http\Controllers\AdminController::class, 'index_supir'])->name('index_supir');
    Route::get('/edit_supir/{supir}', [App\Http\Controllers\AdminController::class, 'edit_supir'])->name('edit_supir');
    Route::patch('/update_supir/{supir}', [App\Http\Controllers\AdminController::class, 'update_supir'])->name('update_supir');
    Route::delete('/hapus_supir/{supir}', [App\Http\Controllers\AdminController::class, 'hapus_supir'])->name('hapus_supir');






    // MUATAN
    Route::get('/muatan/index', [App\Http\Controllers\MuatanController::class, 'index_muatan'])->name('index_muatan');
    Route::get('/muatan/tambah', [App\Http\Controllers\MuatanController::class, 'tambah_muatan'])->name('tambah_muatan');
    Route::post('/muatan/store', [App\Http\Controllers\MuatanController::class, 'store_muatan'])->name('store_muatan');
    Route::get('/muatan/edit/{muatan}', [App\Http\Controllers\MuatanController::class, 'edit_muatan'])->name('edit_muatan');
    Route::patch('/muatan/update/{muatan}', [App\Http\Controllers\MuatanController::class, 'update_muatan'])->name('update_muatan');






    // RUTE
    Route::get('index_rute', [RuteController::class, 'index_rute'])->name('index_rute');
    Route::get('edit_rute/{rute}', [RuteController::class, 'edit_rute'])->name('edit_rute');
    Route::patch('update_rute/{rute}', [RuteController::class, 'update_rute'])->name('update_rute');
    Route::get('rute/tambah', [RuteController::class, 'tambah_rute'])->name('tambah_rute');
    Route::post('rute/store', [RuteController::class, 'store_rute'])->name('store_rute');




    // JADWAL
    Route::get('jadwal/index', [JadwalController::class, 'jadwal'])->name('index_jadwal');
    Route::get('jadwal/tambah', [JadwalController::class, 'tambah_jadwal'])->name('tambah_jadwal');
    Route::post('jadwal/store', [JadwalController::class, 'store_jadwal'])->name('store_jadwal');
    Route::get('jadwal/edit/{jadwal}', [JadwalController::class, 'edit_jadwal'])->name('edit_jadwal');
    Route::patch('jadwal/update/{jadwal}', [JadwalController::class, 'update_jadwal'])->name('update_jadwal');
 

});





// MIDDLEWARE PEMILIK KAPAL
Route::middleware(['pemilik_kapal'])->group(function(){
    Route::get('index_kapal', [PemilikKapalController::class, 'index_kapal'])->name('index_kapal');
    Route::get('tambah_kapal', [PemilikKapalController::class, 'tambah_kapal'])->name('tambah_kapal');
    Route::post('store_kapal', [PemilikKapalController::class, 'store_kapal'])->name('store_kapal');
    Route::get('edit_kapal/{kapal}', [PemilikKapalController::class, 'edit_kapal'])->name('edit_kapal');
    Route::patch('update_kapal/{kapal}', [PemilikKapalController::class, 'update_kapal'])->name('update_kapal');
});





// MIDDLEWARE PENUMPANG
Route::middleware(['penumpang'])->group(function(){
    // Pemesanan Jadwal
    Route::get('jadwal/index_pesan/', [JadwalController::class, 'index_jadwal_penumpang'])->name('index_jadwal_penumpang');
    Route::get('jadwal/formulir/{id}', [JadwalController::class, 'form_pesan_jadwal'])->name('form_pesan_jadwal');
    Route::post('jadwal/checkout', [JadwalController::class, 'checkout'])->name('checkout_jadwal');
    // Route::get('jadwal/pesanan', [JadwalController::class, 'pesanan'])->name('pesanan_jadwal');
    Route::get('jadwal/pembayaran/{id}', [JadwalController::class, 'pembayaran'])->name('pembayaran_jadwal');
    Route::get('jadwal/pesanan', [PesananController::class, 'pesanan_jadwal_paid'])->name('pesanan_jadwal_paid');


    
    Route::get('jadwal/detail/{idJadwal}', [JadwalController::class, 'detail_jadwal'])->name('detail_jadwal');
// TAMAR


    // Tiket
    Route::get('jadwal/tiket/{order_id}', [TiketController::class, 'invoice'])->name('tiket');
});








// MIDTRANS TRY
Route::get('midtrans/status/{id}', [MidtransController::class, 'checkOrderStatusSp']);
Route::get('midtrans/stok/{order_id}', [MidtransController::class, 'stok']);
Route::get('midtrans/jadwal/{jadwalId}', [MidtransController::class, 'lihatjadwal']);
Route::get('midtrans/tes_detail_stok', [JadwalController::class, 'tes_detail_stok']);



Route::get('midtrans/cek_muatan_validasi/{idJadwal}', [MidtransController::class, 'cek_muatan_validasi']);


// JADWAL TRY
// Route::get('try/filter_jadwal', [TryController::class, 'filter_jadwal']);
Route::get('try/home2', [TryController::class, 'home']);
Route::post('filter_jadwal', [TryController::class, 'index_jadwal_penumpang_filter'])->name('filter_jadwal');

