<?php

namespace App\Http\Controllers;
use App\Models\Rute;
use Illuminate\Support\Facades\Redirect;



use Illuminate\Http\Request;

class RuteController extends Controller
{
    //
    public function index_rute(){
        $rutes = Rute::all();

        $stoks = [
            ["id" => 1, "total" => ["stok1" => 10, "stok2" => 12]],
            ["id" => 2, "total" => ["stok1" => 20, "stok2" => 30]]
        ];


        return view('Rute.index', compact('rutes', 'stoks'));
    }

    public function edit_rute(Rute $rute){
        return view('Rute.edit', compact('rute'));
    }

    public function update_rute(Request $request, Rute $rute){
        $request->validate([
            'lokasi_berangkat' => 'required',
            'lokasi_tujuan' => 'required',
            'aktif' => 'required|in:0,1',
        ], [
            'aktif.in' => 'Status harus berisi nilai 0 atau 1 atau nilai boolean.',
        ]);
        

        $rute->update([
            'lokasi_berangkat' => $request->lokasi_berangkat,
            'lokasi_tujuan' => $request->lokasi_tujuan,
            'aktif' => $request->aktif,
        ]);

        return Redirect::route('index_rute');
    }

    public function tambah_rute(){
        return view('Rute.tambah');
    }

    public function store_rute(Request $request){
        $request->validate([
            'lokasi_berangkat' => 'required',
            'lokasi_tujuan' => 'required',
        ]);

        Rute::create([
            'lokasi_berangkat' => $request->lokasi_berangkat,
            'lokasi_tujuan' => $request->lokasi_tujuan,
        ]);

        return Redirect::route('index_rute')->with('success', 'Berhasil Menambah Rute!');
    }

    public function hapus_rute(Rute $rute){
        $rute->delete();
        return Redirect::route('index_rute')->with('delete', 'Berhasil Menghapus Rute!');
    }

}
